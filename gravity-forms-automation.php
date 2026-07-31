<?php
/**
 * Plugin Name: Gravity Forms Automation
 * Description: Automation patterns for Gravity Forms submissions, routing, and business workflows.
 * Version: 0.1.0
 * Author: Sang Huynh Xuan
 * License: GPL-2.0-or-later
 */

declare(strict_types=1);

namespace SangPortfolio;

if (! defined('ABSPATH')) {
    exit;
}

final class GravityFormsAutomationPlugin {
    public function __construct() {
        add_action('init', [$this, 'bootstrap']);
    }

    public function bootstrap(): void {
        do_action('sang_portfolio_gravity_forms_automation_ready');
    }
}

new GravityFormsAutomationPlugin();
