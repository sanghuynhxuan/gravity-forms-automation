<?php
declare(strict_types=1);
namespace SangPortfolio;
if (! defined('ABSPATH')) { exit; }
final class GravityFormsAutomationFeature {
    private const OPTION = 'gravity_forms_automation_enabled';
    private const SLUG = 'gravity-forms-automation';
    private const TITLE = 'Gravity Forms Automation';
    public function register(): void {
        add_action('admin_init', [$this, 'registerSettings']);
        add_action('admin_menu', [$this, 'registerPage']);
        if (Support::enabled(self::OPTION)) { $this->registerFeature(); }
    }
    public function registerSettings(): void { register_setting(self::SLUG, self::OPTION, ['sanitize_callback' => static fn($value): string => empty($value) ? '0' : '1']); }
    public function registerPage(): void { add_options_page(self::TITLE, self::TITLE, 'manage_options', self::SLUG, [$this, 'renderPage']); }
    public function renderPage(): void { if (! current_user_can('manage_options')) { return; } echo '<div class="wrap"><h1>' . esc_html(self::TITLE) . '</h1><form method="post" action="options.php">'; settings_fields(self::SLUG); echo '<label><input type="checkbox" name="' . esc_attr(self::OPTION) . '" value="1" ' . checked(Support::enabled(self::OPTION), true, false) . '> ' . esc_html__('Enable feature', 'sang-portfolio') . '</label>'; submit_button(); echo '</form></div>'; }
    private function registerFeature(): void { add_action('gform_after_submission', [$this, 'recordSubmission'], 10, 2); }
    public function recordSubmission(array $entry, array $form): void { $events = (array) get_option('sang_portfolio_gravity_events', []); $events[] = ['form_id' => (int) $form['id'], 'entry_id' => (int) $entry['id'], 'time' => time()]; update_option('sang_portfolio_gravity_events', array_slice($events, -50), false); }
}
