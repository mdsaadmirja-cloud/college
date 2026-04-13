<?php
$pageTitle = $pageTitle ?? 'College CMS';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="/college/public/assets/css/dashboard.css" rel="stylesheet">
    <style id="dark_theme">
body {
    background-color: #0f172a;
    color: #e2e8f0;
}

.card {
    background-color: #1e293b;
    color: #e2e8f0;
}

.card-header {
    background-color: #1e293b !important;
    border-bottom: 1px solid #334155;
}

.form-select, .btn {
    background-color: #1e293b;
    color: #e2e8f0;
    border: 1px solid #334155;
}

.form-select:focus {
    box-shadow: none;
    border-color: #6366f1;
}

.text-muted {
    color: #94a3b8 !important;
}
</style>
<style id="animation_style">
.card {
    transition: all 0.3s ease-in-out;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.3);
}
</style>
</head>
<body>