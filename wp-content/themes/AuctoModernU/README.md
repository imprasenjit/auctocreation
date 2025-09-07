# AuctoModern WordPress Theme

A modern, responsive WordPress theme for Auctocreation event management company featuring Bootstrap 5, AOS animations, and contemporary design patterns.

## Features

### 🎨 Modern Design

- Contemporary, clean design with custom CSS variables
- Glass morphism and gradient effects
- Modern color palette with customizable accent colors
- Smooth animations using AOS (Animate On Scroll)
- Responsive design that works on all devices

### 🚀 Performance Optimized

- Optimized CSS and JavaScript loading
- Image lazy loading support
- Preload critical resources
- Minimal dependencies for fast loading times

### 📱 Mobile-First Responsive

- Bootstrap 5 responsive grid system
- Touch-friendly navigation and interactions
- Optimized for mobile, tablet, and desktop screens
- Progressive Web App ready structure

### 🎯 Event Management Focus

- Custom post types for slides, productions, festivals, achievements
- Event gallery with lightbox functionality
- Venue/property showcase with booking modal
- Service-specific landing pages
- Portfolio and testimonial sections

### ♿ Accessibility Ready

- WCAG 2.1 compliance features
- Screen reader friendly
- High contrast mode support
- Keyboard navigation support
- Focus indicators and skip links

## Installation

### Requirements

- WordPress 5.0 or higher
- PHP 7.4 or higher
- Modern web browser with CSS Grid and Flexbox support

### Installation Steps

1. Download the theme files
2. Upload to `/wp-content/themes/AuctoModern/`
3. Activate the theme in WordPress admin
4. Configure theme options in Customizer
5. Set up your menus and widgets

### Recommended Plugins

- **Yoast SEO** - For breadcrumbs and SEO optimization
- **Contact Form 7** - For advanced contact forms
- **LightGallery** - For enhanced gallery functionality (auto-loaded)

## Theme Structure

```
AuctoModern/
├── assets/
│   ├── css/
│   │   └── custom.css
│   ├── js/
│   │   ├── main.js
│   │   └── gallery.js
│   └── images/
├── inc/
│   └── nav-walker.php
├── template_part/
│   ├── banner-home.php
│   ├── production-home.php
│   ├── festival-home.php
│   ├── achievement-home.php
│   ├── gallery-home.php
│   └── owned-property-home.php
├── functions.php
├── style.css
├── header.php
├── footer.php
├── index.php
├── page.php
├── single.php
└── README.md
```

## Customization

### Theme Options

The theme includes several customization options available in the WordPress Customizer:

- **Hero Section**: Customize hero title and subtitle
- **Colors**: Primary and accent color customization
- **Logo**: Upload custom logo
- **Menus**: Primary and footer navigation menus

### Custom Post Types

The theme registers several custom post types:

1. **Slides** - For hero carousel slides
2. **Production** - For production services showcase
3. **Festival** - For festival management portfolio
4. **Achievement** - For awards and achievements timeline
5. **Owned Property** - For venues and facilities

### CSS Variables

The theme uses CSS custom properties for easy customization:

```css
:root {
  --primary-color: #2c3e50;
  --accent-color: #e74c3c;
  --secondary-color: #f39c12;
  --font-primary: "Inter", sans-serif;
  --font-secondary: "Playfair Display", serif;
}
```

### Template Parts

Template parts are modular and can be easily customized:

- `banner-home.php` - Hero section with carousel
- `production-home.php` - Production services showcase
- `festival-home.php` - Festival management section
- `achievement-home.php` - Awards timeline
- `gallery-home.php` - Photo gallery preview
- `owned-property-home.php` - Venues and facilities

## JavaScript Features

### Main Script (main.js)

- AOS initialization and scroll animations
- Smooth scrolling for anchor links
- Back-to-top button functionality
- Image lazy loading
- Counter animations
- Gallery filtering
- Form validation
- Toast notifications

### Gallery Script

- LightGallery integration
- Image lazy loading
- Touch gesture support
- Keyboard navigation

## Styling Guidelines

### Color Scheme

- **Primary**: #2c3e50 (Dark blue-gray)
- **Accent**: #e74c3c (Red)
- **Secondary**: #f39c12 (Orange)
- **Light**: #f8f9fa (Light gray)
- **Dark**: #343a40 (Dark gray)

### Typography

- **Primary Font**: Inter (Modern sans-serif)
- **Secondary Font**: Playfair Display (Elegant serif for headings)
- **Base Size**: 16px
- **Line Height**: 1.6

### Components

All components follow the "modern-card" design pattern:

- Rounded corners (8px-20px)
- Subtle shadows
- Hover effects with transform and shadow changes
- Consistent padding and margins

## Browser Support

- Chrome 88+
- Firefox 85+
- Safari 14+
- Edge 88+
- Mobile browsers (iOS Safari 14+, Chrome Mobile 88+)

## SEO Features

- Schema markup ready
- Open Graph meta tags
- Twitter Card support
- Optimized HTML structure
- Fast loading performance
- Mobile-friendly design

## Development

### Local Development Setup

1. Set up local WordPress installation
2. Clone theme to themes directory
3. Install dependencies (Bootstrap 5, AOS, Font Awesome via CDN)
4. Enable development mode in functions.php

### Build Process

The theme uses CDN resources for major dependencies:

- Bootstrap 5.3.0
- AOS 2.3.4
- Font Awesome 6.4.0
- Google Fonts (Inter, Playfair Display)

### Code Standards

- Follows WordPress Coding Standards
- PSR-4 autoloading ready
- Commented and documented code
- Semantic HTML5 markup

## Support & Updates

### Version History

- **v1.0** - Initial release with modern design system
- Bootstrap 5 integration
- AOS animations
- Custom post types
- Mobile-first responsive design

### Getting Help

1. Check the documentation above
2. Review the code comments in theme files
3. Test in a staging environment before production

### Extending the Theme

The theme is built with extensibility in mind:

- Hook-based architecture
- Modular template parts
- CSS custom properties for easy styling
- JavaScript events for custom functionality

## Credits

### Frameworks & Libraries

- **Bootstrap 5** - Responsive CSS framework
- **AOS** - Animate On Scroll library
- **Font Awesome** - Icon library
- **Google Fonts** - Web fonts (Inter, Playfair Display)

### Development

- **Author**: Hiranya Sarma / Netrotechnologies.com
- **Base Theme**: Custom built for Auctocreation
- **WordPress Version**: 6.0+ compatible

## License

This theme is developed specifically for Auctocreation. All rights reserved.

---

For technical support or customization requests, contact: [netrotechnologies.com](https://netrotechnologies.com)
