@extends('welcome')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Projects</div>

                <div class="card-body">
                    <ul class="lists">
                        <li v-for="project in projects" v-text="project.name" :data-id="project.id"></li>
                    </ul>
                </div>
            </div>

            <form method="POST" action="projects" @submit.prevent="submitForm" @keydown="form.errors.clear($event.target.name)">
                <div class="form-group row">
                    <label for="name" class="col-sm-12 col-form-label">Project Name</label>
                    <div class="col-md-12">
                        <input id="name" type="text" name="name" class="form-control" v-model="form.name">
                        <span class="error" v-text="form.errors.get('name')"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-md-12 col-form-label">Description</label>
                    <div class="col-md-12">
                        <input id="description" type="text" name="description" class="form-control" v-model="form.description">
                        <span v-if="form.errors.has('description')" class="error" v-text="form.errors.get('description')"></span>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-12 offset-md-12">
                        <button type="submit" class="btn btn-primary" :disabled="form.errors.any()">
                            Create
                        </button> 
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
