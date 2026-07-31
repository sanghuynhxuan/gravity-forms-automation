# Gravity Forms Automation

A Gravity Forms submission listener that records a bounded automation event log.

## Functional scope

- Runs as a standalone WordPress plugin
- Uses a plugin-specific PHP namespace to avoid class collisions
- Includes an admin settings screen and an enable/disable option
- Implements real WordPress or WooCommerce hooks for the stated workflow
- Cleans up its option on uninstall

## Installation

Copy this repository into `wp-content/plugins/gravity-forms-automation`, activate it, then open **Settings → Gravity Forms Automation**.

## Production note

This is a working reference implementation intended for discovery and adaptation to a client’s requirements. Test on staging before deployment.
