{{csrf_field()}}
<div class="card">
    <div class="card-body">
        <div class="form-group">
            <label>Аты</label>
            <input value="{{$lesson->name}}"
                   type="text"
                   name="name"
                   class="form-control"
                   placeholder="Аты" required>
        </div>
        <div class="form-group">
            <label>Сипаттамасы</label>
            <textarea id="editor1"
                      name="description"
                      class="form-control"
                      required>{{$lesson->description}}</textarea>
        </div>
        <button type="submit" class="btn btn-success mr-2">Сақтау</button>
    </div>
    <div class="card-footer">
        @include('admin.parts.error')
    </div>
</div>

@section('scripts')
    <script>
        CKEDITOR.replace('editor1');
    </script>
@endsection