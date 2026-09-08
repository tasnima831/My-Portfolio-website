<?php

return [
    'contact_email' => env('PORTFOLIO_CONTACT_EMAIL'),
    'contact_phone' => env('PORTFOLIO_CONTACT_PHONE'),
    // Each unique slug powers both its card and /projects/{slug} page. Images are relative to public/.
    // Optional details: overview, role, timeline, features (list), challenge, future_improvements, solution, outcome,
    // gallery (list of image/alt/caption arrays), demo_url, and source_url.
    'projects' => [
        [
            'slug' => 'house-rent-management-system',
            'title' => 'House-Rent Management System',
            'description' => 'A team-built house rental website with listings, calendar-based filtering, bookings, and an admin dashboard.',
            'overview' => 'Developed as a team project during professional training at IT Lab Solutions, this website lets users find houses to rent or list houses for rent. It includes a booking system and an admin dashboard.',
            'role' => 'Team contributor — calendar-based house filtering and booking system',
            'features' => ['House rental listings.', 'Calendar-based house filtering.', 'User booking system.', 'Admin dashboard.'],
            'challenge' => [
                'Building calendar-based house filtering as my contribution to the rental platform.',
                'Developing the booking system within a shared team project during my professional training.',
            ],
            'future_improvements' => [
                'Explore clearer calendar feedback to help users understand available booking dates.',
                'Create a YouTube walkthrough explaining the rental flow and my calendar and booking contributions.',
            ],
            'tags' => ['Laravel', 'MySQL', 'Node.js'],
            'image' => 'images/house rent/house rent 1.jpg',
            'gallery' => [
                ['image' => 'images/house rent/house rent 2.jpg', 'alt' => 'House-Rent screenshot 2', 'caption' => 'House-Rent 2'],
                ['image' => 'images/house rent/house rent 3.jpg', 'alt' => 'House-Rent screenshot 3', 'caption' => 'House-Rent 3'],
            ],
            'demo_url' => null,
            'source_url' => 'https://github.com/kazihalim00/House-Rent',
        ],
        [
            'slug' => 'projectsell',
            'title' => 'ProjectSell',
            'description' => 'A project-selling and learning website for software engineering projects.',
            'overview' => 'ProjectSell is a learning management system that combines selling software engineering projects with teaching.',
            'features' => ['Software engineering projects for sale.', 'Educational content alongside projects.'],
            'challenge' => [
                'Bringing project selling and educational content together in one website.',
                'Presenting software engineering projects as both products and learning resources.',
            ],
            'future_improvements' => [
                'Add YouTube project walkthroughs that explain how the websites are built.',
                'Expand project documentation with setup guides and explanations of the code.',
            ],
            'tags' => ['Laravel', 'MySQL', 'Node.js'],
            'image' => 'images/Projectsell/1.jpg',
            'gallery' => [
                ['image' => 'images/Projectsell/2.jpg', 'alt' => 'ProjectSell screenshot 2'],
                ['image' => 'images/Projectsell/3.jpg', 'alt' => 'ProjectSell screenshot 3'],
                ['image' => 'images/Projectsell/4.jpg', 'alt' => 'ProjectSell screenshot 4'],
                ['image' => 'images/Projectsell/5.jpg', 'alt' => 'ProjectSell screenshot 5'],
                ['image' => 'images/Projectsell/7.jpg', 'alt' => 'ProjectSell screenshot 7'],
            ],
            'demo_url' => null,
            'source_url' => 'https://github.com/tasnima831/ProjectSell-website',
        ],
    ],
    // Set these to your actual numbers to show experience and project cards.
    'coding_since' => 2024, // Calendar-year estimate based on 2 years of coding in 2026.
    'completed_projects' => 2,
    // Set your live website count manually, or use null to count projects with a demo_url.
    'live_websites' => 0,
    // Replace these placeholders with your education details; add an entry for each qualification.
    'services' => [
        ['title' => 'Website Development', 'description' => 'A thoughtful website for your business, personal brand, or next idea. Built with clean code and layouts that feel natural on every screen.', 'details' => 'Responsive layouts / Portfolio websites / Business websites'],
        ['title' => 'Laravel Applications', 'description' => 'Turn your idea into a practical web application with Laravel, from the interface to the back-end features that keep it running.', 'details' => 'Custom features / Database integration / Back-end development'],
        ['title' => 'Website Redesign', 'description' => 'Give your existing website a clearer structure and a fresh visual direction, with attention to readability and ease of use.', 'details' => 'Visual refresh / Mobile layouts / Navigation improvements'],
        ['title' => 'Front-End Development', 'description' => 'Bring your design to life with responsive interfaces, thoughtful interactions, and polished details using HTML, CSS, and JavaScript.', 'details' => 'Design to code / Interactive elements / Responsive interfaces'],
    ],
    'experience' => [
        [
            'title' => 'Laravel Vue Developer Program',
            'organization' => 'IT Lab Solutions Limited',
            'year' => '2026',
            'timeline_period' => '2022 - 2026',
            'duration' => '5 months',
            'description' => 'I gained hands-on experience with Laravel, Vue.js, PHP, MySQL, REST APIs, and full-stack web development.',
        ],
    ],
    'education' => [
        [
            'qualification' => 'B.Sc in Software Engineering',
            'institution' => 'Metropolitan University',
            'years' => '2022 - 2026',
            'expected_finish' => '2026',
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
        ['name' => 'Git', 'icon' => 'https://cdn.simpleicons.org/git', 'group' => 'tool'],
        ['name' => 'GitHub', 'icon' => 'https://cdn.simpleicons.org/github', 'group' => 'tool'],
        ['name' => 'VS Code', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/vscode/vscode-original.svg', 'group' => 'tool'],
        ['name' => 'Figma', 'icon' => 'https://cdn.simpleicons.org/figma', 'group' => 'tool'],
        ['name' => 'Notion', 'icon' => 'https://cdn.simpleicons.org/notion', 'group' => 'tool'],
        ['name' => 'Vite', 'icon' => 'https://cdn.simpleicons.org/vite', 'group' => 'tool'],
        ['name' => 'Vercel', 'icon' => 'https://cdn.simpleicons.org/vercel', 'group' => 'tool'],
    ],
];



