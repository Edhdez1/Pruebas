<?php
// backend/fonts_data.php
// Lista única de fuentes. Se usa para llenar la base de datos la primera vez
// y como respaldo cuando MySQL no está disponible.

function cssHelperFontRow(string $name, string $weights): array {
    $family = str_replace(' ', '+', $name);
    $url = "https://fonts.googleapis.com/css2?family={$family}:{$weights}&display=swap";
    return [
        'name' => $name,
        'link_code' => '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n"
            . '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n"
            . '<link href="' . $url . '" rel="stylesheet">',
        'import_code' => "@import url('{$url}');",
        'css_rule' => "font-family: '{$name}', sans-serif;",
    ];
}

function cssHelperDefaultFonts(): array {
    return [
        cssHelperFontRow('Lato', 'ital,wght@0,400;0,700;0,900;1,400'),
        cssHelperFontRow('Montserrat', 'ital,wght@0,400;0,500;0,700;1,400'),
        cssHelperFontRow('Open Sans', 'ital,wght@0,300..800;1,300..800'),
        cssHelperFontRow('Poppins', 'ital,wght@0,400;0,500;0,600;0,700;1,400'),
        cssHelperFontRow('Roboto', 'ital,wght@0,400;0,700;1,400'),
    ];
}
