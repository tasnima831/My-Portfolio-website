<?php

return [
    'contact_email' => env('PORTFOLIO_CONTACT_EMAIL'),
    'contact_phone' => env('PORTFOLIO_CONTACT_PHONE'),
    // Each unique slug powers both its card and /projects/{slug} page. Images are relative to public/.
    // Optional details: overview, role, timeline, features (list), challenge, future_improvements, solution, outcome,
    // gallery (list of image/alt/caption arrays), demo_url, and source_url.
    'projects' => [
        ['slug' => 'studio-portfolio', 'challenge' => ['Keeping animated project cards easy to navigate.', 'Balancing large previews with readable project details.', 'Adapting the layout to smaller screens.'], 'future_improvements' => ['Add real project screenshots.', 'Publish live demos and source links.', 'Expand each project with a complete case study.'], 'gallery' => [['image' => 'images/sample-project-desktop.svg', 'alt' => 'Close-up of the sample desktop design', 'caption' => 'Desktop design / A closer look']], 'overview' => 'A sample developer portfolio that brings selected work, skills, education, and contact information together in one responsive website.', 'features' => ['Animated project folder with carousel navigation.', 'Responsive layouts for desktop and mobile.', 'Dedicated sections for skills, education, and project inquiries.'], 'title' => 'Studio Portfolio', 'description' => 'Sample project: a responsive developer portfolio with animated projects and a clean mobile layout.', 'tags' => ['HTML', 'CSS', 'JavaScript', 'Laravel', 'Vite'], 'image' => 'images/sample-project.svg', 'demo_url' => null, 'source_url' => null],
        ['slug' => 'project-02', 'title' => 'Project 02', 'description' => 'Share what you built and your contribution.', 'tags' => [], 'image' => null, 'demo_url' => null, 'source_url' => null],
        ['slug' => 'project-03', 'title' => 'Project 03', 'description' => 'Highlight the idea and its most useful feature.', 'tags' => [], 'image' => null, 'demo_url' => null, 'source_url' => null],
        ['slug' => 'project-04', 'title' => 'Project 04', 'description' => 'Tell the story behind another piece of your work.', 'tags' => [], 'image' => null, 'demo_url' => null, 'source_url' => null],
    ],
    // Set these to your actual numbers to show experience and project cards.
    'coding_since' => 2024, // Calendar-year estimate based on 2 years of coding in 2026.
    'completed_projects' => 4,
    // Replace these placeholders with your education details; add an entry for each qualification.
    'services' => [
        ['title' => 'Website Development', 'description' => 'A thoughtful website for your business, personal brand, or next idea. Built with clean code and layouts that feel natural on every screen.', 'details' => 'Responsive layouts / Portfolio websites / Business websites'],
        ['title' => 'Laravel Applications', 'description' => 'Turn your idea into a practical web application with Laravel, from the interface to the back-end features that keep it running.', 'details' => 'Custom features / Database integration / Back-end development'],
        ['title' => 'Website Redesign', 'description' => 'Give your existing website a clearer structure and a fresh visual direction, with attention to readability and ease of use.', 'details' => 'Visual refresh / Mobile layouts / Navigation improvements'],
        ['title' => 'Front-End Development', 'description' => 'Bring your design to life with responsive interfaces, thoughtful interactions, and polished details using HTML, CSS, and JavaScript.', 'details' => 'Design to code / Interactive elements / Responsive interfaces'],
    ],
    'experience' => [
        [
            'title' => 'Laravel Course',
            'organization' => 'IT Lab',
            'year' => '2026',
            'timeline_period' => '2022 - 2026',
            'duration' => '5 months',
            'description' => 'Five months of learning Laravel through a course at IT Lab.',
        ],
    ],
    'education' => [
        [
            'qualification' => 'B.Sc in Software Engineering',
            'institution' => 'Metropolitan University',
            'years' => '2022 - 2026',
            'expected_finish' => '2026',
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




