<style>
    :root { --ink: #25231f; --muted: #756f65; --paper: #f5f1e9; --panel: #fffdf8; --line: #ded8cd; --accent: #c96845; --accent-dark: #93452e; --sage: #667568; }
    * { box-sizing: border-box; }
    body { margin: 0; color: var(--ink); background: var(--paper); font-family: Georgia, 'Times New Roman', serif; }
    a { color: inherit; }
    .shell { width: min(1120px, calc(100% - 48px)); margin: 0 auto; }
    .topbar { display: flex; align-items: center; justify-content: space-between; padding: 28px 0; border-bottom: 1px solid var(--line); }
    .brand { font-size: 18px; letter-spacing: .04em; text-decoration: none; }
    .brand span { color: var(--accent); }
    .topbar nav { display: flex; align-items: center; gap: 22px; font: 13px Arial, sans-serif; color: var(--muted); }
    .topbar nav a { text-decoration: none; }
    .topbar nav a:hover { color: var(--accent-dark); }
    main { padding: 64px 0 90px; }
    .eyebrow { color: var(--accent-dark); font: 11px Arial, sans-serif; letter-spacing: .16em; text-transform: uppercase; }
    h1 { max-width: 650px; margin: 12px 0 16px; font-size: clamp(42px, 7vw, 78px); font-weight: 400; line-height: .98; letter-spacing: -.03em; }
    .intro { max-width: 520px; margin: 0; color: var(--muted); font-size: 18px; line-height: 1.55; }
    .toolbar { display: flex; align-items: end; justify-content: space-between; gap: 24px; margin: 56px 0 20px; }
    .toolbar h2 { margin: 0; font-size: 25px; font-weight: 400; }
    .button { display: inline-flex; align-items: center; justify-content: center; min-height: 44px; padding: 0 18px; border: 1px solid var(--accent-dark); background: var(--accent); color: #fffaf3; font: 13px Arial, sans-serif; text-decoration: none; cursor: pointer; }
    .button:hover { background: var(--accent-dark); }
    .button.secondary { border-color: var(--line); background: transparent; color: var(--ink); }
    .button.secondary:hover { border-color: var(--ink); background: transparent; }
    .flash { margin: 0 0 22px; padding: 14px 16px; border-left: 3px solid var(--sage); background: #e7ece5; color: #435146; font: 14px Arial, sans-serif; }
    .table-wrap { overflow-x: auto; border-top: 1px solid var(--ink); }
    table { width: 100%; border-collapse: collapse; min-width: 700px; }
    th { padding: 14px 12px; color: var(--muted); font: 10px Arial, sans-serif; letter-spacing: .12em; text-align: left; text-transform: uppercase; }
    td { padding: 20px 12px; border-top: 1px solid var(--line); vertical-align: top; font-size: 16px; }
    td:first-child { color: var(--muted); font-size: 14px; }
    .product-name { font-size: 20px; }
    .description { max-width: 330px; color: var(--muted); font-size: 14px; line-height: 1.45; }
    .actions { display: flex; gap: 14px; font: 12px Arial, sans-serif; }
    .actions a { text-decoration: underline; text-underline-offset: 3px; }
    .actions a:last-child { color: var(--accent-dark); }
    .empty { padding: 42px 12px; border-top: 1px solid var(--line); color: var(--muted); font-size: 18px; }
    .form-frame { width: min(680px, 100%); margin: 0 auto; }
    .form-frame h1 { font-size: clamp(42px, 7vw, 64px); }
    .form { margin-top: 42px; }
    .field { margin-bottom: 24px; }
    label { display: block; margin-bottom: 8px; font: 11px Arial, sans-serif; letter-spacing: .12em; text-transform: uppercase; }
    input, textarea { width: 100%; padding: 14px 0; border: 0; border-bottom: 1px solid var(--line); outline: 0; background: transparent; color: var(--ink); font: 18px Georgia, serif; }
    textarea { min-height: 120px; resize: vertical; }
    input:focus, textarea:focus { border-color: var(--accent); }
    .split { display: grid; grid-template-columns: 1fr 1fr; gap: 28px; }
    .form-actions { display: flex; gap: 14px; margin-top: 36px; }
    .login-page { min-height: 100vh; display: grid; place-items: center; padding: 32px 0; }
    .login-frame { width: min(470px, calc(100% - 48px)); }
    .login-frame h1 { font-size: clamp(44px, 10vw, 70px); }
    .login-note { margin: 0 0 36px; color: var(--muted); font: 14px Arial, sans-serif; line-height: 1.6; }
    .error { margin-bottom: 24px; padding: 13px 15px; border-left: 3px solid var(--accent); background: #f4dfd7; color: var(--accent-dark); font: 13px Arial, sans-serif; }
    @media (max-width: 640px) { .shell { width: min(100% - 32px, 1120px); } .topbar { padding: 20px 0; } .topbar nav { gap: 12px; } main { padding: 44px 0 64px; } .toolbar { align-items: start; flex-direction: column; margin-top: 42px; } .split { grid-template-columns: 1fr; gap: 0; } .form-actions { flex-direction: column; } .button { width: 100%; } }
</style>