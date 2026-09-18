<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Certificate;
use App\Models\WorkExperience;
use App\Models\Project;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Akun Admin User (Bisa untuk Login Dashboard)
        User::updateOrCreate(
            ['email' => 'sh4k4175@gmail.com'],
            [
                'name' => 'Shaka Banuasta',
                'password' => Hash::make('password123'),
            ]
        );

        // 2. Profile Data
        Profile::create([
            'full_name' => 'Shaka Banuasta',
            'nickname' => 'Shaka',
            'status_badge' => 'Available for Projects & Collaboration',
            'headline' => 'Mahasiswa Sistem Informasi',
            'bio' => 'Mahasiswa Sistem Informasi Semester 3 di Universitas Pamulang dengan passion tinggi dalam eksplorasi teknologi, analisis sistem, dan pengembangan aplikasi web yang responsif serta intuitif.',
            'current_semester' => 3,
            'university' => 'Universitas Pamulang',
            'faculty' => 'Fakultas Ilmu Komputer',
            'study_program' => 'Sistem Informasi',
            'focus_area' => 'Web Development & Business Process Analysis',
            'email' => 'sh4k4175@gmail.com',
            'github_url' => 'https://github.com/AkulaD',
            'linkedin_url' => 'https://www.linkedin.com/in/shaka-banuasta-798129309/',
        ]);

        // 3. Skills Data
        $skills = [
            ['category' => 'Frontend Development', 'skill_name' => 'HTML5 & CSS3', 'percentage' => 85, 'sort_order' => 1],
            ['category' => 'Frontend Development', 'skill_name' => 'Tailwind CSS', 'percentage' => 80, 'sort_order' => 2],
            ['category' => 'Frontend Development', 'skill_name' => 'JavaScript (Basic/ES6)', 'percentage' => 70, 'sort_order' => 3],
            ['category' => 'Backend Development', 'skill_name' => 'PHP', 'percentage' => 75, 'sort_order' => 4],
            ['category' => 'Backend Development', 'skill_name' => 'Laravel Framework', 'percentage' => 70, 'sort_order' => 5],
            ['category' => 'Backend Development', 'skill_name' => 'MySQL / Database', 'percentage' => 75, 'sort_order' => 6],
            ['category' => 'Systems & Tools', 'skill_name' => 'Analisis Proses Bisnis', 'percentage' => 80, 'sort_order' => 7],
            ['category' => 'Systems & Tools', 'skill_name' => 'Git & Version Control', 'percentage' => 70, 'sort_order' => 8],
            ['category' => 'Systems & Tools', 'skill_name' => 'UML & Flowchart Design', 'percentage' => 85, 'sort_order' => 9],
        ];
        foreach ($skills as $skill) { 
            Skill::create($skill); 
        }

        // 4. Education Data
        Education::create([
            'level_type' => 'Perguruan Tinggi',
            'institution_name' => 'Universitas Pamulang',
            'major' => 'S1 Sistem Informasi',
            'period' => 'September 2025 – Sekarang',
            'details' => json_encode([
                'Berfokus pada Arsitektur Sistem Informasi, termasuk Desain Basis Data, Pengembangan Web, dan Sistem Informasi Manajemen.',
                'Mata Kuliah Relevan: Analisis & Desain Sistem, Manajemen Data.'
            ]),
            'sort_order' => 1
        ]);

        Education::create([
            'level_type' => 'Sekolah Menengah Kejuruan',
            'institution_name' => 'SMKN 6 Tangerang Selatan',
            'major' => 'Rekayasa Perangkat Lunak (RPL)',
            'period' => 'Juni 2022 – Juli 2025',
            'details' => json_encode([
                'Pelatihan praktis mengenai Pengembangan Perangkat Lunak, berfokus ke pengembangan web dan desktop.',
                'Spesialisasi dalam pengembangan backend, memanfaatkan basis data SQL.'
            ]),
            'sort_order' => 2
        ]);

        // 5. Certificates Data
        Certificate::create([
            'title' => 'Pengembangan Web Tingkat Lanjut',
            'issuer' => 'Dicoding Indonesia',
            'year' => 2026,
            'file_path' => '#',
            'sort_order' => 1
        ]);

        // 6. Work Experience Data
        WorkExperience::create([
            'company_name' => "PT. O'Clock Kreasi Utama Garment",
            'position' => 'Administrasi & Pemrosesan Pembayaran',
            'employment_type' => 'Magang',
            'period' => 'Juni 2025 – Juli 2026',
            'bullet_points' => json_encode([
                'Melakukan proses pembayaran digital harian dengan memproses lebih dari 250 transaksi perbankan.',
                'Menjaga catatan keuangan yang teliti dengan mencocokkan laporan mutasi rekening harian dan memantau seluruh arus kas.',
                'Memfasilitasi transaksi lintas batas dengan klien melalui WeChat Pay, memastikan proses pembayaran berjalan lancar.'
            ]),
            'sort_order' => 1
        ]);

        // 7. Projects Data
        Project::create([
            'title' => 'Web Resmi Perusahaan',
            'category' => 'Company Profile',
            'subtitle' => 'PT Redision Teknologi Indonesia',
            'year' => 2024,
            'bullet_points' => json_encode([
                'Merancang dan mengembangkan situs web profil perusahaan dengan antarmuka modern.',
                'Mengoptimalkan tata letak agar responsif di berbagai perangkat.'
            ]),
            'tech_stack' => 'Laravel / Tailwind',
            'project_url' => '#',
            'sort_order' => 1
        ]);
    }
}