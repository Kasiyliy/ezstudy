{{csrf_field()}}
<div class="card">
    <div class="card-body">
        <div class="form-group">
            <label>Сұрақ</label>
            <input value="{{$question->content}}"
                   type="text"
                   name="name"
                   class="form-control"
                   placeholder="Cұрақ" required>
        </div>
        <button type="submit" class="btn btn-success mr-2">Сақтау</button>
    </div>
    <div class="card-footer">
        @include('admin.parts.error')
    </div>
</div>
