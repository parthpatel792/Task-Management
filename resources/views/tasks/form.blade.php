@csrf

<div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="title" name="title" value="{{ old('title', $task->title ?? '') }}">
    @if ($errors->has('title'))
        <div class="invalid-feedback">
            {{ $errors->first('title') }}
        </div>
    @endif
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description" name="description">{{ old('description', $task->description ?? '') }}</textarea>
    @if ($errors->has('description'))
        <div class="invalid-feedback">
            {{ $errors->first('description') }}
        </div>
    @endif
</div>

<div class="form-group">
    <label for="category_id">Category</label>
    <select name="category_id" id="category_id" class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}" required>
        <option value="">Please select a category</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ (old('category_id', $task->category_id ?? '') == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
        @endforeach
    </select>
    @if ($errors->has('category_id'))
        <div class="invalid-feedback">
            {{ $errors->first('category_id') }}
        </div>
    @endif
</div>


<div class="form-group">
    <label for="priority">Priority</label>
    <select name="priority" id="priority" class="form-control" required>
        <option value="low" {{ (old('priority', $task->priority ?? '') == 'low') ? 'selected' : '' }}>Low</option>
        <option value="medium" {{ (old('priority', $task->priority ?? '') == 'medium') ? 'selected' : '' }}>Medium</option>
        <option value="high" {{ (old('priority', $task->priority ?? '') == 'high') ? 'selected' : '' }}>High</option>
    </select>
</div>

<div class="form-group">
    <label for="due_date">Due Date</label>
    <input type="date" class="form-control" name="due_date" id="due_date" value="{{ old('due_date', $task->due_date ?? '') }}" required>
</div>

<div class="form-group mt-4">
    <button type="submit" class="btn btn-success">Submit</button>
</div>
