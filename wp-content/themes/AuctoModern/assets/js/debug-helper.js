/**
 * Debug Helper for AuctoModern Theme
 * Add ?debug=theme to any page URL to see theme status
 */

(function () {
  "use strict";

  // Check if debug mode is enabled
  function isDebugMode() {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get("debug") === "theme";
  }

  // Create debug panel
  function createDebugPanel() {
    const panel = document.createElement("div");
    panel.className = "debug-panel";
    panel.id = "theme-debug-panel";

    panel.innerHTML = `
            <h4>🎯 Theme Status</h4>
            <div id="debug-content">
                <div class="status">
                    <span>Initializing...</span>
                    <span>⏳</span>
                </div>
            </div>
            <button onclick="getThemeStatus()" style="margin-top: 10px; padding: 5px; background: var(--modern-primary); color: white; border: none; border-radius: 3px; cursor: pointer;">
                Refresh Status
            </button>
            <button onclick="document.getElementById('theme-debug-panel').style.display='none'" style="margin-top: 5px; padding: 5px; background: #666; color: white; border: none; border-radius: 3px; cursor: pointer; width: 100%;">
                Close
            </button>
        `;

    document.body.appendChild(panel);
    return panel;
  }

  // Update debug panel content
  function updateDebugPanel() {
    const debugContent = document.getElementById("debug-content");
    if (!debugContent || !window.AuctoModernTheme) return;

    const theme = window.AuctoModernTheme;
    const components = theme.components;

    let html = "";

    // Overall status
    html += `<div class="status ${theme.initialized ? "success" : "error"}">
            <span>Theme Initialized</span>
            <span>${theme.initialized ? "✅" : "❌"}</span>
        </div>`;

    // Component status
    Object.keys(components).forEach((component) => {
      const status = components[component];
      html += `<div class="status ${status ? "success" : "error"}">
                <span>${component.toUpperCase()}</span>
                <span>${status ? "✅" : "❌"}</span>
            </div>`;
    });

    // Error count
    if (theme.errors && theme.errors.length > 0) {
      html += `<div class="status error">
                <span>Errors</span>
                <span>${theme.errors.length} ⚠️</span>
            </div>`;
    }

    // Performance metrics
    if (window.performance && window.performance.timing) {
      const loadTime =
        window.performance.timing.loadEventEnd -
        window.performance.timing.navigationStart;
      html += `<div class="status">
                <span>Load Time</span>
                <span>${loadTime}ms</span>
            </div>`;
    }

    debugContent.innerHTML = html;
  }

  // Initialize debug mode
  function initDebugMode() {
    if (!isDebugMode()) return;

    console.log("🎯 AuctoModern Theme Debug Mode Enabled");

    const panel = createDebugPanel();
    panel.classList.add("show");

    // Update panel every 2 seconds
    setInterval(updateDebugPanel, 2000);

    // Initial update after theme loads
    setTimeout(updateDebugPanel, 1000);

    // Listen for theme ready event
    document.addEventListener("auctocreation:theme:ready", function (e) {
      console.log("🎯 Theme Ready Event Fired:", e.detail);
      setTimeout(updateDebugPanel, 500);
    });

    // Add debug info to console
    console.log("Available debug commands:");
    console.log("- getThemeStatus() - View theme initialization status");
    console.log("- AOS - Access AOS library (if loaded)");
    console.log("- jQuery or $ - Access jQuery (if loaded)");
  }

  // Initialize when DOM is ready
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initDebugMode);
  } else {
    initDebugMode();
  }
})();
