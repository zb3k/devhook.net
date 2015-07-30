<?php

// Файл с секретной фразой (Secret) заданной в настройках вебхуков
$secret = file_get_contents('../.github_secret');

// Получаем хэш-подпись и название алгоритма шифрования
$headers = getallheaders();

list($algo, $hash) = explode('=', $headers['X-Hub-Signature'], 2);

// Получаем тело запроса
$payload = file_get_contents('php://input');

// Проверяем соответствие хэшей
$payload_hash = hash_hmac($algo, $payload, $secret);
if ($hash !== $payload_hash) {
    // Останавливаем выполнение скрипта
    header('HTTP/1.0 401 Unauthorized');
    die('401 Unauthorized');
}

// Начинаем обновлять сайт...

header('Content-Type: text/plain');
chdir('../repo');

// Сбрасываем все изменения и подтягиваем последнюю версию сайта из репозитория
shell_exec('git reset --hard');
shell_exec('git pull');

// Устанавливаем необходимые настройки hexo
shell_exec('hexo config render_drafts false'); // не редерить черновики
shell_exec('hexo config public');
shell_exec('hexo config url http://devhook.net');

// Пытаемся сгенерировать статичный сайт
$result = shell_exec('hexo generate -f');

// Если небыло ошибок то сохраняем текущий сайт в public_html.bak
// и публикуем свежую версию
if (strpos($result, 'ERROR') === false) {
    shell_exec('rm -rf ../public_html.bak');
    shell_exec('mv ../public_html ../public_html.bak');
    shell_exec('mv public ../public_html');
} else {
    // Сообщаем githab-у что webhook выполнен с ошибкой
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
}

echo $result;
