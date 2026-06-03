@extends('layouts.admin')

@section('title', 'Kelola Admin')

@section('content')
<style>
    :root {
        --bi-blue: #002F5F;
        --bi-blue-dark: #001f3f;
        --bi-yellow: #b78d2e;
        --bi-red: #ef4444;
        --text-heading: #111827;
        --text-muted: #6b7280;
        --border-light: #e5e7eb;
    }

    .page-header-title {
        font-size: 2.75rem;
        font-weight: 800;
        color: var(--text-heading);
        margin-bottom: 0.25rem;
        margin-top: 0;
    }

    .page-header-sub {
        color: var(--text-muted);
        font-size: 0.92rem;
        margin: 0;
    }

    .page-actions {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 1rem;
        margin-bottom: 1.75rem;
        flex-wrap: wrap;
    }

    .btn-bi-tambah {
        background-color: var(--bi-blue);
        color: white;
        border: none;
        padding: 0.95rem 1.4rem;
        border-radius: 0.85rem;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        text-decoration: none;
        box-shadow: 0 16px 32px rgba(0, 47, 95, 0.12);
        transition: transform 0.2s ease, background-color 0.2s ease;
        font-size: 0.92rem;
        white-space: nowrap;
    }

    .btn-bi-tambah:hover {
        background-color: var(--bi-blue-dark);
        color: white;
        transform: translateY(-1px);
        text-decoration: none;
    }

    .admin-card {
        background: transparent;
        border: none;
        box-shadow: none;
        padding: 0;
    }

    .table thead th {
        color: var(--text-muted);
        font-size: 0.78rem;
        font-weight: 700;
        border-top: none;
        border-bottom: 1px solid rgba(229, 231, 235, 0.9);
        text-transform: uppercase;
        padding: 1rem 0.75rem;
        background: transparent;
    }

    .table td {
        vertical-align: middle;
        padding: 1rem 0.75rem;
        border-color: rgba(229, 231, 235, 0.9);
    }

    .table tbody tr:hover {
        background: rgba(229, 231, 235, 0.3);
    }

    .badge-role {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 0.4rem 0.85rem;
        border-radius: 999px;
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 0.3px;
    }

    .badge-role.superadmin {
        background: #fef3c7;
        color: #92400e;
        border: 1px solid #fcd34d;
    }

    .badge-role.admin {
        background: #dbeafe;
        color: #1e40af;
        border: 1px solid #93c5fd;
    }

    .actions-group {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: nowrap;
    }

    .action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border-radius: 10px;
        border: none;
        cursor: pointer;
        font-size: 0.82rem;
        transition: all 0.2s ease;
        text-decoration: none;
    }

    .btn-edit {
        background: #eff6ff;
        color: #2563eb;
    }

    .btn-edit:hover {
        background: #2563eb;
        color: white;
    }

    .btn-delete {
        background: #fef2f2;
        color: var(--bi-red);
    }

    .btn-delete:hover {
        background: var(--bi-red);
        color: white;
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: var(--text-muted);
    }

    .empty-state i {
        font-size: 2.5rem;
        opacity: 0.35;
        display: block;
        margin-bottom: 12px;
    }

    .alert-success-custom {
        background: #f0fdf4;
        border: 1px solid #bbf7d0;
        color: #166534;
        border-radius: 12px;
        padding: 14px 18px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 0.92rem;
        font-weight: 500;
    }

    .alert-error-custom {
        background: #fef2f2;
        border: 1px solid #fecaca;
        color: #991b1b;
        border-radius: 12px;
        padding: 14px 18px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 0.92rem;
        font-weight: 500;
    }

    .info-banner {
        background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
        border: 1px solid #bfdbfe;
        border-radius: 14px;
        padding: 16px 20px;
        margin-bottom: 24px;
        display: flex;
        align-items: flex-start;
        gap: 12px;
    }

    .info-banner i {
        color: #2563eb;
        margin-top: 2px;
        flex-shrink: 0;
    }

    .info-banner p {
        margin: 0;
        color: #1e40af;
        font-size: 0.88rem;
        line-height: 1.6;
    }
</style>

{{-- Header --}}
<div class="page-actions">
    <div>
        <h1 class="page-header-title">Kelola Admin</h1>
        <p class="page-header-sub">Buat, edit, dan hapus akun admin yang dapat mengakses panel ini.</p>
    </div>
    <a href="{{ route('admin.users.create') }}" class="btn-bi-tambah">
        <i class="fas fa-user-plus"></i>
        Tambah Admin
    </a>
</div>

{{-- Alert --}}
@if(session('success'))
    <div class="alert-success-custom">
        <i class="fas fa-check-circle"></i>
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert-error-custom">
        <i class="fas fa-exclamation-circle"></i>
        {{ session('error') }}
    </div>
@endif

{{-- Info Banner --}}
<div class="info-banner">
    <i class="fas fa-shield-halved"></i>
    <p>
        Halaman ini hanya dapat diakses oleh <strong>Super Admin</strong>.
        Admin biasa yang kamu buat di sini dapat login ke <code>/login</code> dan mengelola seluruh konten website,
        namun tidak bisa mengakses halaman Kelola Admin ini.
    </p>
</div>

{{-- Tabel --}}
<div class="admin-card">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead>
                <tr>
                    <th width="5%">NO</th>
                    <th width="30%">NAMA</th>
                    <th width="35%">EMAIL</th>
                    <th width="15%">ROLE</th>
                    <th width="15%">DIBUAT</th>
                    <th width="1%">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse($admins as $admin)
                <tr>
                    <td>{{ $loop->iteration + ($admins->currentPage() - 1) * $admins->perPage() }}</td>

                    <td>
                        <div style="font-weight: 700; color: var(--text-heading); font-size: 0.95rem;">
                            {{ $admin->name }}
                        </div>
                    </td>

                    <td>
                        <span style="color: var(--text-muted); font-size: 0.88rem;">
                            {{ $admin->email }}
                        </span>
                    </td>

                    <td>
                        <span class="badge-role {{ $admin->role }}">
                            <i class="fas fa-{{ $admin->role === 'superadmin' ? 'crown' : 'user' }}"></i>
                            {{ $admin->role === 'superadmin' ? 'Super Admin' : 'Admin' }}
                        </span>
                    </td>

                    <td>
                        <span style="color: var(--text-muted); font-size: 0.85rem;">
                            {{ $admin->created_at->format('d M Y') }}
                        </span>
                    </td>

                    <td style="white-space: nowrap;">
                        <div class="actions-group">
                            <a href="{{ route('admin.users.edit', $admin->id) }}"
                               class="action-btn btn-edit"
                               title="Edit akun ini">
                                <i class="fas fa-pen"></i>
                            </a>
                            <form action="{{ route('admin.users.destroy', $admin->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Hapus akun admin {{ addslashes($admin->name) }}? Tindakan ini tidak bisa dibatalkan.')"
                                  style="display:inline-block; margin:0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn btn-delete" title="Hapus akun ini">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">
                        <div class="empty-state">
                            <i class="fas fa-users"></i>
                            Belum ada akun admin.
                            <a href="{{ route('admin.users.create') }}"
                               style="color: var(--bi-blue); font-weight: 600; text-decoration: none;">
                                Tambah sekarang
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    @if($admins->hasPages())
        <div class="d-flex justify-content-end mt-4">
            {{ $admins->links() }}
        </div>
    @endif
</div>
@endsection