@unless(request()->routeIs('filament.admin.auth.login'))
<style>
    /* ===== SIDEBAR ===== */
    .fi-sidebar {
        background-color: #ffffff !important;
        border-right: 1px solid #e5e7eb !important;
        padding: 0.75rem !important;
    }

    .fi-sidebar-header {
        background-color: #ffffff !important;
        border: 2px solid #059669 !important;
        border-radius: 1rem !important;
        padding: 0.5rem 0.75rem !important;
        margin-bottom: 1rem !important;
    }

    .fi-sidebar-group-label {
        color: #9ca3af !important;
        font-size: 0.7rem !important;
        font-weight: 600 !important;
        text-transform: uppercase !important;
        letter-spacing: 0.05em !important;
        padding-left: 0.5rem !important;
    }

    .fi-sidebar-item-button {
        border-radius: 0.625rem !important;
        margin-bottom: 2px !important;
        color: #374151 !important;
        font-size: 0.875rem !important;
        font-weight: 500 !important;
        transition: all 0.15s ease !important;
    }

    .fi-sidebar-item-button:hover {
        background-color: #d1fae5 !important;
        color: #059669 !important;
    }

    .fi-sidebar-item-button:hover svg {
        color: #059669 !important;
        stroke: #059669 !important;
    }

    .fi-sidebar-item-button.fi-active,
    .fi-sidebar-item-button[aria-current="page"] {
        background-color: #059669 !important;
        color: #ffffff !important;
    }

    .fi-sidebar-item-button.fi-active svg,
    .fi-sidebar-item-button[aria-current="page"] svg {
        color: #ffffff !important;
        stroke: #ffffff !important;
    }

    .fi-sidebar-item-button svg {
        color: #6b7280 !important;
    }

    /* ===== TOPBAR / NAVBAR ===== */
    .fi-topbar,
    nav.fi-topbar {
        background-color: #ffffff !important;
        border-bottom: 1px solid #e5e7eb !important;
        box-shadow: none !important;
    }

    /* ===== BACKGROUND ===== */
    .fi-main,
    .fi-main-ctn,
    .fi-layout {
        background-color: #f3f4f6 !important;
    }
</style>
@endunless