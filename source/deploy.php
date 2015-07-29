<?php

$secret = file_get_contents('../.github_secret');

// Split signature into algorithm and hash
$headers      = getallheaders();
$hub_signature = $headers['X-Hub-Signature'];
list($algo, $hash) = explode('=', $hub_signature, 2);

// Get payload
$payload = file_get_contents('php://input');

// Calculate hash based on payload and the secret
$payload_hash = hash_hmac($algo, $payload, $secret);

// Check if hashes are equivalent
if ($hash !== $payload_hash) {
    header('HTTP/1.0 401 Unauthorized');
    die('401 Unauthorized');
}

chdir('../repo');

shell_exec('git reset --hard');
shell_exec('git pull');

shell_exec('hexo config render_drafts false');
shell_exec('hexo config public');

echo shell_exec('hexo generate -f');
echo shell_exec('rm -rf ../public_html.bak');
echo shell_exec('mv ../public_html ../public_html.bak');
echo shell_exec('mv public ../public_html');