<?php

return [
    'contact_email' => env('PORTFOLIO_CONTACT_EMAIL'),
    'contact_phone' => env('PORTFOLIO_CONTACT_PHONE'),
    // Add actual project details here. Images are paths relative to public/.
    'projects' => [
        ['title' => 'Studio Portfolio', 'description' => 'Sample project: a responsive developer portfolio with animated projects and a clean mobile layout.', 'tags' => ['HTML', 'CSS', 'JavaScript', 'Laravel', 'Vite'], 'image' => 'images/sample-project.svg', 'details_url' => '/images/sample-project.svg', 'demo_url' => null, 'source_url' => null],
        ['title' => 'Project 02', 'description' => 'Share what you built and your contribution.', 'tags' => [], 'image' => null, 'demo_url' => null, 'source_url' => null],
        ['title' => 'Project 03', 'description' => 'Highlight the idea and its most useful feature.', 'tags' => [], 'image' => null, 'demo_url' => null, 'source_url' => null],
        ['title' => 'Project 04', 'description' => 'Tell the story behind another piece of your work.', 'tags' => [], 'image' => null, 'demo_url' => null, 'source_url' => null],
    ],
    // Set these to your actual numbers to show experience and project cards.
    'coding_since' => 2024, // Calendar-year estimate based on 2 years of coding in 2026.
    'completed_projects' => 4,
    // Replace these placeholders with your education details; add an entry for each qualification.
    'education' => [
        [
            'qualification' => 'B.Sc in Software Engineering',
            'institution' => 'Metropolitan University',
            'years' => '2022 - Present',
            'field' => 'Software Engineering',
            'cgpa' => '3.70',
            'description' => '', // Optional: subject, result, or academic highlights.
        ],
        [
            'qualification' => 'HSC',
            'institution' => 'Scholarshome School & College',
            'years' => '2020 - 2022',
            'field' => 'Science',
            'gpa' => '4.83',
            'description' => '',
        ],
        [
            'qualification' => 'SSC',
            'institution' => 'Hazrat Shahparan (R) High School',
            'years' => '2018 - 2020',
            'field' => 'Science',
            'gpa' => '4.83',
            'description' => '',
        ],
    ],
    'skills' => [
        ['name' => 'HTML', 'icon' => 'html5', 'group' => 'frontend'],
        ['name' => 'CSS', 'icon' => 'css3', 'group' => 'frontend'],
        ['name' => 'JavaScript', 'icon' => 'javascript', 'group' => 'frontend'],
        ['name' => 'PHP', 'icon' => 'php', 'group' => 'backend'],
        ['name' => 'Tailwind CSS', 'icon' => 'tailwindcss', 'group' => 'frontend'],
        ['name' => 'Laravel', 'icon' => 'laravel', 'group' => 'framework'],
        ['name' => 'Vue.js', 'icon' => 'https://cdn.simpleicons.org/vuedotjs', 'group' => 'framework'],
        ['name' => 'Git', 'icon' => 'https://cdn.simpleicons.org/git', 'group' => 'tool'],
        ['name' => 'GitHub', 'icon' => 'https://cdn.simpleicons.org/github', 'group' => 'tool'],
        ['name' => 'VS Code', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/vscode/vscode-original.svg', 'group' => 'tool'],
        ['name' => 'Figma', 'icon' => 'https://cdn.simpleicons.org/figma', 'group' => 'tool'],
        ['name' => 'Notion', 'icon' => 'https://cdn.simpleicons.org/notion', 'group' => 'tool'],
        ['name' => 'Vite', 'icon' => 'https://cdn.simpleicons.org/vite', 'group' => 'tool'],
        ['name' => 'Vercel', 'icon' => 'https://cdn.simpleicons.org/vercel', 'group' => 'tool'],
    ],
];

