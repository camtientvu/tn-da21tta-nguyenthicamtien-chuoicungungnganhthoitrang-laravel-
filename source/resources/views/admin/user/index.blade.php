@extends("admin.home.home")

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $title }}</h3>
    </div>

    @if (Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Ngày tạo</th>
                    <th class="text-center">Sửa</th>
                    <th class="text-center">Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                    <td class="text-center">
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i> Sửa
                        </a>
                    </td>
                    <td class="text-center">
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Xóa người dùng này?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i> Xóa
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection