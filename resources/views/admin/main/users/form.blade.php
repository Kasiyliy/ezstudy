{{csrf_field()}}
<div class="card">
    <div class="card-body">
        <div class="form-group">
            <label>Аты</label>
            <input value="{{$user->first_name}}"
                   type="text"
                   name="first_name"
                   class="form-control"
                   placeholder="Аты" required>
        </div>
        <div class="form-group">
            <label>Жөні</label>
            <input value="{{$user->last_name}}"
                   type="text"
                   name="last_name"
                   class="form-control"
                   placeholder="Жөні" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail3">Email</label>
            <input value="{{$user->email}}"
                   type="email"
                   name="email"
                   class="form-control"
                   placeholder="Email" required>
        </div>
        @if(!$user->id)
            <div class="form-group">
                <label>Құпия сөз</label>
                <input type="password"
                       name="password"
                       class="form-control"
                       placeholder="Құпия сөз"
                       required>
            </div>
        @endif
        <div class="form-group">
            <label for="exampleInputCity1">Рөль</label>
            <select class="form-control" name="role_id" id="role_id" required>
                @foreach($roles as $role)
                    <option {{$user->role_id == $role->id ? ' selected ': ''}}
                            value="{{$role->id}}">
                        {{$role->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success mr-2">Сақтау</button>
        <button class="btn btn-light">Бас тарту</button>
    </div>
    <div class="card-footer">
        @include('admin.parts.error')
    </div>
</div>