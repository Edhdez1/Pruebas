<?php
// includes/palettes_data.php

function hexToRgbString($hex) {
    $hex = ltrim($hex, '#');
    if (strlen($hex) === 3) {
        $hex = $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
    }
    $r = hexdec(substr($hex, 0, 2));
    $g = hexdec(substr($hex, 2, 2));
    $b = hexdec(substr($hex, 4, 2));
    return "rgb($r, $g, $b)";
}

function hexToHslString($hex) {
    $hex = ltrim($hex, '#');
    if (strlen($hex) === 3) {
        $hex = $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
    }
    $r = hexdec(substr($hex, 0, 2)) / 255;
    $g = hexdec(substr($hex, 2, 2)) / 255;
    $b = hexdec(substr($hex, 4, 2)) / 255;
    
    $max = max($r, $g, $b);
    $min = min($r, $g, $b);
    $l = ($max + $min) / 2;
    $d = $max - $min;

    if ($d == 0) {
        $h = $s = 0;
    } else {
        $s = $l > 0.5 ? $d / (2 - $max - $min) : $d / ($max + $min);
        switch ($max) {
            case $r: $h = (($g - $b) / $d) + ($g < $b ? 6 : 0); break;
            case $g: $h = (($b - $r) / $d) + 2; break;
            case $b: $h = (($r - $g) / $d) + 4; break;
        }
        $h /= 6;
    }
    $h = round($h * 360);
    $s = round($s * 100);
    $l = round($l * 100);
    return "hsl($h, $s%, $l%)";
}

$palettes = [
    'catppuccin' => [
        'name' => 'Catppuccin',
        'badge' => '4 subpaletas',
        'description' => 'Paleta pastel comunitaria diseñada con alto contraste, confort visual y armonía de color.',
        'preview_colors' => ['#8839ef', '#1e66f5', '#40a02b', '#fe640b', '#d20f39'],
        'subpalettes' => [
            'latte' => [
                'name' => 'Latte (Tema Claro)',
                'description' => 'Variante clara y luminosa para trabajar a la luz del día.',
                'colors' => [
                    ['name' => 'Rosewater', 'hex' => '#dc8a78'],
                    ['name' => 'Flamingo', 'hex' => '#dd7878'],
                    ['name' => 'Pink', 'hex' => '#ea76cb'],
                    ['name' => 'Mauve', 'hex' => '#8839ef'],
                    ['name' => 'Red', 'hex' => '#d20f39'],
                    ['name' => 'Maroon', 'hex' => '#e64553'],
                    ['name' => 'Peach', 'hex' => '#fe640b'],
                    ['name' => 'Yellow', 'hex' => '#df8e1d'],
                    ['name' => 'Green', 'hex' => '#40a02b'],
                    ['name' => 'Teal', 'hex' => '#179299'],
                    ['name' => 'Sky', 'hex' => '#04a5e5'],
                    ['name' => 'Sapphire', 'hex' => '#209fb5'],
                    ['name' => 'Blue', 'hex' => '#1e66f5'],
                    ['name' => 'Lavender', 'hex' => '#7287fd'],
                    ['name' => 'Text', 'hex' => '#4c4f69'],
                    ['name' => 'Subtext 1', 'hex' => '#5c5f77'],
                    ['name' => 'Subtext 0', 'hex' => '#6c6f85'],
                    ['name' => 'Overlay 2', 'hex' => '#7c7f93'],
                    ['name' => 'Overlay 1', 'hex' => '#8c8fa1'],
                    ['name' => 'Overlay 0', 'hex' => '#9ca0b0'],
                    ['name' => 'Surface 2', 'hex' => '#acb0be'],
                    ['name' => 'Surface 1', 'hex' => '#bcc0cc'],
                    ['name' => 'Surface 0', 'hex' => '#ccd0da'],
                    ['name' => 'Base', 'hex' => '#eff1f5'],
                    ['name' => 'Mantle', 'hex' => '#e6e9ef'],
                    ['name' => 'Crust', 'hex' => '#dce0e8']
                ]
            ],
            'frappe' => [
                'name' => 'Frappé (Tema Oscuro Suave)',
                'description' => 'Variante oscura con tonos tenues y contraste moderado.',
                'colors' => [
                    ['name' => 'Rosewater', 'hex' => '#f2d5cf'],
                    ['name' => 'Flamingo', 'hex' => '#eebebe'],
                    ['name' => 'Pink', 'hex' => '#f4b8e4'],
                    ['name' => 'Mauve', 'hex' => '#ca9ee6'],
                    ['name' => 'Red', 'hex' => '#e78284'],
                    ['name' => 'Maroon', 'hex' => '#ea999c'],
                    ['name' => 'Peach', 'hex' => '#ef9f76'],
                    ['name' => 'Yellow', 'hex' => '#e5c890'],
                    ['name' => 'Green', 'hex' => '#a6d189'],
                    ['name' => 'Teal', 'hex' => '#81c8be'],
                    ['name' => 'Sky', 'hex' => '#99d1db'],
                    ['name' => 'Sapphire', 'hex' => '#85c1dc'],
                    ['name' => 'Blue', 'hex' => '#8caaee'],
                    ['name' => 'Lavender', 'hex' => '#babbf1'],
                    ['name' => 'Text', 'hex' => '#c6d0f5'],
                    ['name' => 'Subtext 1', 'hex' => '#b5bfe2'],
                    ['name' => 'Subtext 0', 'hex' => '#a5adce'],
                    ['name' => 'Overlay 2', 'hex' => '#949cbb'],
                    ['name' => 'Overlay 1', 'hex' => '#838ba7'],
                    ['name' => 'Overlay 0', 'hex' => '#737994'],
                    ['name' => 'Surface 2', 'hex' => '#626880'],
                    ['name' => 'Surface 1', 'hex' => '#51576d'],
                    ['name' => 'Surface 0', 'hex' => '#414559'],
                    ['name' => 'Base', 'hex' => '#303446'],
                    ['name' => 'Mantle', 'hex' => '#292c3c'],
                    ['name' => 'Crust', 'hex' => '#232634']
                ]
            ],
            'macchiato' => [
                'name' => 'Macchiato (Tema Oscuro Medio)',
                'description' => 'Variante oscura equilibrada entre saturación y profundidad.',
                'colors' => [
                    ['name' => 'Rosewater', 'hex' => '#f4dbd6'],
                    ['name' => 'Flamingo', 'hex' => '#f0c6c6'],
                    ['name' => 'Pink', 'hex' => '#f5bde6'],
                    ['name' => 'Mauve', 'hex' => '#c6a0f6'],
                    ['name' => 'Red', 'hex' => '#ed8796'],
                    ['name' => 'Maroon', 'hex' => '#ee99a0'],
                    ['name' => 'Peach', 'hex' => '#f5a97f'],
                    ['name' => 'Yellow', 'hex' => '#eed49f'],
                    ['name' => 'Green', 'hex' => '#a6da95'],
                    ['name' => 'Teal', 'hex' => '#8bd5ca'],
                    ['name' => 'Sky', 'hex' => '#91d7e3'],
                    ['name' => 'Sapphire', 'hex' => '#7dc4e4'],
                    ['name' => 'Blue', 'hex' => '#8aadf4'],
                    ['name' => 'Lavender', 'hex' => '#b7bdf8'],
                    ['name' => 'Text', 'hex' => '#cad3f5'],
                    ['name' => 'Subtext 1', 'hex' => '#b8c0e0'],
                    ['name' => 'Subtext 0', 'hex' => '#a5adcb'],
                    ['name' => 'Overlay 2', 'hex' => '#939ab7'],
                    ['name' => 'Overlay 1', 'hex' => '#8087a2'],
                    ['name' => 'Overlay 0', 'hex' => '#6e738d'],
                    ['name' => 'Surface 2', 'hex' => '#5b6078'],
                    ['name' => 'Surface 1', 'hex' => '#494d64'],
                    ['name' => 'Surface 0', 'hex' => '#363a4f'],
                    ['name' => 'Base', 'hex' => '#24273a'],
                    ['name' => 'Mantle', 'hex' => '#1e2030'],
                    ['name' => 'Crust', 'hex' => '#181926']
                ]
            ],
            'mocha' => [
                'name' => 'Mocha (Tema Oscuro Profundo)',
                'description' => 'La versión oscura más popular de Catppuccin con colores intensos.',
                'colors' => [
                    ['name' => 'Rosewater', 'hex' => '#f5e0dc'],
                    ['name' => 'Flamingo', 'hex' => '#f2cdcd'],
                    ['name' => 'Pink', 'hex' => '#f5c2e7'],
                    ['name' => 'Mauve', 'hex' => '#cba6f7'],
                    ['name' => 'Red', 'hex' => '#f38ba8'],
                    ['name' => 'Maroon', 'hex' => '#eba0ac'],
                    ['name' => 'Peach', 'hex' => '#fab387'],
                    ['name' => 'Yellow', 'hex' => '#f9e2af'],
                    ['name' => 'Green', 'hex' => '#a6e3a1'],
                    ['name' => 'Teal', 'hex' => '#94e2d5'],
                    ['name' => 'Sky', 'hex' => '#89dceb'],
                    ['name' => 'Sapphire', 'hex' => '#74c7ec'],
                    ['name' => 'Blue', 'hex' => '#89b4fa'],
                    ['name' => 'Lavender', 'hex' => '#b4befe'],
                    ['name' => 'Text', 'hex' => '#cdd6f4'],
                    ['name' => 'Subtext 1', 'hex' => '#bac2de'],
                    ['name' => 'Subtext 0', 'hex' => '#a6adc8'],
                    ['name' => 'Overlay 2', 'hex' => '#9399b2'],
                    ['name' => 'Overlay 1', 'hex' => '#7f849c'],
                    ['name' => 'Overlay 0', 'hex' => '#6c7086'],
                    ['name' => 'Surface 2', 'hex' => '#585b70'],
                    ['name' => 'Surface 1', 'hex' => '#45475a'],
                    ['name' => 'Surface 0', 'hex' => '#313244'],
                    ['name' => 'Base', 'hex' => '#1e1e2e'],
                    ['name' => 'Mantle', 'hex' => '#181825'],
                    ['name' => 'Crust', 'hex' => '#11111b']
                ]
            ]
        ]
    ],
    'dracula' => [
        'name' => 'Dracula',
        'badge' => '2 subpaletas',
        'description' => 'Famoso tema oscuro para desarrolladores con colores vibrantes, alto contraste y estética gótica moderna.',
        'preview_colors' => ['#282a36', '#bd93f9', '#ff79c6', '#50fa7b', '#8be9fd'],
        'subpalettes' => [
            'clasico' => [
                'name' => 'Dracula Clásico',
                'description' => 'Paleta original de Dracula con colores neón de alto impacto.',
                'colors' => [
                    ['name' => 'Background', 'hex' => '#282a36'],
                    ['name' => 'Current Line', 'hex' => '#44475a'],
                    ['name' => 'Selection', 'hex' => '#44475a'],
                    ['name' => 'Foreground', 'hex' => '#f8f8f2'],
                    ['name' => 'Comment', 'hex' => '#6272a4'],
                    ['name' => 'Cyan', 'hex' => '#8be9fd'],
                    ['name' => 'Green', 'hex' => '#50fa7b'],
                    ['name' => 'Orange', 'hex' => '#ffb86c'],
                    ['name' => 'Pink', 'hex' => '#ff79c6'],
                    ['name' => 'Purple', 'hex' => '#bd93f9'],
                    ['name' => 'Red', 'hex' => '#ff5555'],
                    ['name' => 'Yellow', 'hex' => '#f1fa8c']
                ]
            ],
            'soft' => [
                'name' => 'Dracula Soft',
                'description' => 'Variante con un contraste ligeramente atenuado para menor fatiga visual.',
                'colors' => [
                    ['name' => 'Background', 'hex' => '#343746'],
                    ['name' => 'Current Line', 'hex' => '#46495b'],
                    ['name' => 'Selection', 'hex' => '#53576c'],
                    ['name' => 'Foreground', 'hex' => '#f8f8f2'],
                    ['name' => 'Comment', 'hex' => '#6272a4'],
                    ['name' => 'Cyan', 'hex' => '#9ae9f5'],
                    ['name' => 'Green', 'hex' => '#69f098'],
                    ['name' => 'Orange', 'hex' => '#fbb387'],
                    ['name' => 'Pink', 'hex' => '#ea88c2'],
                    ['name' => 'Purple', 'hex' => '#c39cf6'],
                    ['name' => 'Red', 'hex' => '#e95f6f'],
                    ['name' => 'Yellow', 'hex' => '#f4f99d']
                ]
            ]
        ]
    ],
    'blancos_y_negros' => [
        'name' => 'Blancos y Negros',
        'badge' => '3 subpaletas',
        'description' => 'Escalas monocromáticas esenciales para interfaces limpias, minimalistas y tipografía pulida.',
        'preview_colors' => ['#ffffff', '#cbd5e1', '#6b7280', '#374151', '#000000'],
        'subpalettes' => [
            'neutra' => [
                'name' => 'Escala Neutra',
                'description' => 'Transición pura del blanco al negro sin saturación de matices.',
                'colors' => [
                    ['name' => 'Blanco Puro', 'hex' => '#ffffff'],
                    ['name' => 'Gris 50', 'hex' => '#f9fafb'],
                    ['name' => 'Gris 100', 'hex' => '#f3f4f6'],
                    ['name' => 'Gris 200', 'hex' => '#e5e7eb'],
                    ['name' => 'Gris 300', 'hex' => '#d1d5db'],
                    ['name' => 'Gris 400', 'hex' => '#9ca3af'],
                    ['name' => 'Gris 500', 'hex' => '#6b7280'],
                    ['name' => 'Gris 600', 'hex' => '#4b5563'],
                    ['name' => 'Gris 700', 'hex' => '#374151'],
                    ['name' => 'Gris 800', 'hex' => '#1f2937'],
                    ['name' => 'Gris 900', 'hex' => '#111827'],
                    ['name' => 'Gris 950', 'hex' => '#030712'],
                    ['name' => 'Negro Puro', 'hex' => '#000000']
                ]
            ],
            'fria' => [
                'name' => 'Escala Fría (Slate)',
                'description' => 'Grises modernos con ligero matiz azulado para interfaces tecnológicas.',
                'colors' => [
                    ['name' => 'Blanco Frío', 'hex' => '#f8fafc'],
                    ['name' => 'Slate 100', 'hex' => '#f1f5f9'],
                    ['name' => 'Slate 200', 'hex' => '#e2e8f0'],
                    ['name' => 'Slate 300', 'hex' => '#cbd5e1'],
                    ['name' => 'Slate 400', 'hex' => '#94a3b8'],
                    ['name' => 'Slate 500', 'hex' => '#64748b'],
                    ['name' => 'Slate 600', 'hex' => '#475569'],
                    ['name' => 'Slate 700', 'hex' => '#334155'],
                    ['name' => 'Slate 800', 'hex' => '#1e293b'],
                    ['name' => 'Slate 900', 'hex' => '#0f172a'],
                    ['name' => 'Negro Noche', 'hex' => '#020617']
                ]
            ],
            'calida' => [
                'name' => 'Escala Cálida (Stone)',
                'description' => 'Grises cálidos y orgánicos con tonos de piedra y tierra suave.',
                'colors' => [
                    ['name' => 'Blanco Cálido', 'hex' => '#fafaf9'],
                    ['name' => 'Stone 100', 'hex' => '#f5f5f4'],
                    ['name' => 'Stone 200', 'hex' => '#e7e5e4'],
                    ['name' => 'Stone 300', 'hex' => '#d6d3d1'],
                    ['name' => 'Stone 400', 'hex' => '#a8a29e'],
                    ['name' => 'Stone 500', 'hex' => '#78716c'],
                    ['name' => 'Stone 600', 'hex' => '#57534e'],
                    ['name' => 'Stone 700', 'hex' => '#44403c'],
                    ['name' => 'Stone 800', 'hex' => '#292524'],
                    ['name' => 'Stone 900', 'hex' => '#1c1917'],
                    ['name' => 'Negro Azabache', 'hex' => '#0c0a09']
                ]
            ]
        ]
    ]
];
