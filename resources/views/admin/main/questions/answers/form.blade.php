{{csrf_field()}}
<div class="card">
    <div class="card-body">
        <div class="form-group">
            <label>Жауап</label>
            <input value="{{$option->content}}"
                   type="text"
                   name="name"
                   class="form-control"
                   placeholder="Жауап" required>
        </div>
        <div class="form-group">
            <label>Дұрыс/Дұрыс емес</label>
            <input type="checkbox" name="is_right"
                   data-on="Дұрыс"
                   data-off="Дұрыс емес"
                   data-toggle="toggle"
                   class="form-control"
                   data-size="md"
                   value="1" {{$option ? ($option->is_right ? 'checked' : '') : ''}}>
        </div>
        <button type="submit" class="btn btn-success mr-2">Сақтау</button>
    </div>
    <div class="card-footer">
        @include('admin.parts.error')
    </div>
</div>
