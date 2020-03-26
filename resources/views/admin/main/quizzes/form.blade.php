{{csrf_field()}}
<div class="card">
    <div class="card-body">
        <div class="form-group">
            <label>Тест аты</label>
            <input value="{{$quiz->name}}"
                   type="text"
                   name="name"
                   class="form-control"
                   placeholder="Аты" required>
        </div>
        <button type="submit" class="btn btn-success mr-2">Сақтау</button>
        <button class="btn btn-light">Бас тарту</button>
    </div>
    <div class="card-footer">
        @include('admin.parts.error')
    </div>
</div>