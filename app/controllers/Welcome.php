<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Welcome extends Controller {

    public function index() {
        echo '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Welcome to LavaLust</title><style>body{font-family:Arial,sans-serif;background:#0f172a;color:#e2e8f0;padding:40px;} .box{max-width:700px;margin:0 auto;background:#111827;padding:32px;border-radius:12px;box-shadow:0 10px 30px rgba(0,0,0,.2);} h1{margin-bottom:12px;} p{line-height:1.6;}</style></head><body><div class="box"><h1>Welcome to LavaLust</h1><p>Your local app is running successfully.</p><p>This page is intentionally not hitting the database so it works correctly in a fresh localhost setup.</p></div></body></html>';
    }
}
