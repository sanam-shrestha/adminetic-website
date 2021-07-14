<div class="row">
    <div class="col-lg-4">
        <label for="name">Facility Name <span class="text-danger">*</span></label>
        <div class="input-group">
            <input type="text" name="name" id="name" class="form-control" value="{{$facility->name ?? old('name')}}"
                placeholder="Facility Name">
        </div>
    </div>
    <div class="col-lg-4">
        @livewire('admin.category.quick-category', ['model' => 'Facility','category_id' => $category->id ?? null])
    </div>
    <div class="col-lg-2">
        <label for="code">Code</label>
        <div class="input-group">
            <button class="btn btn-primary" type="button" id="code_reload"><i class="fa fa-sync"></i></button>
            <input type="text" name="code" id="code" class="form-control" value="{{$facility->code ?? old('code')}}"
                placeholder="Stay Code" aria-describedby="code_reload_append">
        </div>
    </div>
    <div class="col-lg-2">
        <label for="active">Active</label>
        <div class="mb-2">
            <label class="switch">
                <input type="hidden" name="active" value="0">
                <input name="active" type="checkbox" value="1" id="active"
                    {{isset($facility->active) ? ($facility->active ? 'checked' : '') : 'checked'}}><span
                    class="switch-state"></span>
            </label>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-8">
        <label for="icon_image">Icon PNG Image</label>
        <div class="row">
            <div class="col-lg-6">
                <div class="input-group">
                    <input type="file" name="icon_image" id="icon_image" accept="image/*" onchange="readIconURL(this);">
                </div>
            </div>
            <div class="col-lg-6">
                @if (isset($facility->icon_image))
                <img src="{{asset('storage/'.$facility->icon_image)}}" alt="{{$facility->name ?? ''}}" class="img-fluid"
                    id="facility_icon" style="width: 60px">
                @endif
                <img src="" id="facility_icon_plcaeholder" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <label for="icon">Icon</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i id="showIcon" class="fas fa-icons"></i></span>
            </div>
            <button type="button" class="btn btn-primary" id="iconPicker" data-iconpicker-input="#icon"
                data-iconpicker-preview="#showIcon">Select Icon</button>
            <input type="hidden" name="icon" id="icon"
                value="{{$facility->icon ?? old('icon') ?? 'fas fa-concierge-bell'}}">
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <label for="excerpt">Facility Excerpt <span class="text-danger">*</span></label>
        <textarea name="excerpt" id="excerpt" class="form-control" cols="30"
            rows="10">{{$facility->excerpt ?? ''}}</textarea>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <label for="description">Facility Description</label>
        <textarea name="description" id="heavytexteditor" cols="30" rows="10">{{$facility->excerpt ?? ''}}</textarea>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-6">
        <label for="image">Facility Image</label>
        <input type="file" name="image" id="image" accept="image/*" onchange="readURL(this);">
    </div>
    <div class="col-lg-6">
        @if (isset($facility->image))
        <img src="{{asset($facility->thumbnail('image','small'))}}" alt="{{$facility->name}}">
        @endif
        <img src="" id="facility_image_plcaeholder" class="img-fluid">
    </div>
</div>
<x-adminetic-edit-add-button :model="$facility ?? null" name="Facility" />