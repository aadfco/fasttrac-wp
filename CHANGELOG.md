# Changelog for Fast Trac Theme
All notable changes to the Fast Trac Theme will be documented in this file.

## [1.0.0] 11-28-2018
### INITIAL RELEASE FEATURES
- Built on Foundation Framework
- Customizeable pages via Advanced Custom Fields Pro
- WP-Store Locator to manage and display Fast Trac Stores
- Uses Download Manager to keep manager files private from web.
- Features WPForms for easy form creation.
- Job Listings plugin to create and manage job listings. 
- Google Analytics Dashboard to view page insights.
- User Role Editor to add aditional user roles for site administration and users. 

## [1.0.1] 01-23-19
### UPDATED
- Updated active plugins to current stable versions. 
- Updated WordPress Core to 4.9.10

## [1.1.0] 06-25-19
### UNRELEASED
- About Us page is now ACF enabled for user editing.

### FIXED
- Duplicate of subheader field removed from Fast Points Page.
- Text-domain corrected to proper naming convention (fast-trac) oringinally (fasttac).
- Plugin template files now use theme's text-domain (fast-trac). 
- Theme folder name changed to WordPress default theme naming convention (fast-trac).


### CHANGED
- Favicon now uses WordPress's built-in generator.

### UPDATED
- Wordpress core updated from 4.9.10 -> 5.2
- Header.php file now includes `wp_body_open()` hook for WordPress 5.2 compatibility. This enables users to include `<script>` tags directly inside the body of the page.
- The following plugins were updated:

   - ACF PRO 5.7.10 -> 5.8.1
   - Classic Editor 1.3 -> 1.5
   - Download Manager 2.9.86 -> 2.9.97
   - Google Analytics Dashboard 5.3.7 -> 5.3.8
   - Regenerate Thumbnails 3.1.0 -> 3.1.1
   - Safe SVG 1.9.0 -> 1.9.4
   - User Role Editor 4.49 -> 4.51.1
   - WP Cache 0.8.9.0 -> 0.8.9.5
   - WP Job Manager 1.32.0 -> 1.33.2
   - WP Store Locator 2.2.20 -> 2.2.23
   - WP Forms 1.5.0.4 -> 1.5.3.1
   - WP Forms Abadonment 1.0.2 -> 1.1.0
   - EWWW Image Optimizer 4.6.0 -> 4.8.0
   - Tiny MCE 5.0.0 -> 5.2.1

## [1.1.1] 07-02-19
### ADDED
- About Us page is now ACF enabled for user editing.

### FIXED
- Filtered tab content would shift up and overlap tab navigation if text content did not fill container. Fixed in CSS.