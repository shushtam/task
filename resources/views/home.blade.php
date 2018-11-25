@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Users</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="GET" action="{{url('home')}}">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name"
                                           value="{{array_key_exists("name",$data) ? $data['name'] : ''}}">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-2">
                                    <select name="name_comparison"
                                            class="form-control {{ $errors->has('name_comparison') ? ' is-invalid' : '' }} non-arithmetic">
                                        <option value="1"{{(array_key_exists("name_comparison",$data) && $data['name_comparison'] == 1) ? 'selected' : ''}}>
                                            equal
                                        </option>
                                        <option value="0"{{(array_key_exists("name_comparison",$data) && $data['name_comparison'] == 0) ? 'selected' : ''}}>
                                            contains
                                        </option>
                                    </select>
                                    @if ($errors->has('name_comparison'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name_comparison') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="text"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email"
                                           value="{{array_key_exists("email",$data) ? $data['email'] : ''}}">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-2">
                                    <select name="email_comparison"
                                            class="form-control {{ $errors->has('email_comparison') ? ' is-invalid' : '' }} non-arithmetic">
                                        <option value="1"{{(array_key_exists("email_comparison",$data) && $data['email_comparison'] == 1) ? 'selected' : ''}}>
                                            equal
                                        </option>
                                        <option value="0"{{(array_key_exists("email_comparison",$data) && $data['email_comparison'] == 0) ? 'selected' : ''}}>
                                            contains
                                        </option>
                                    </select>
                                    @if ($errors->has('email_comparison'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email_comparison') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="age"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>

                                <div class="col-md-4">
                                    <input id="age" type="number"
                                           class="form-control {{ $errors->has('age') ? ' is-invalid' : '' }}"
                                           name="age"
                                           value="{{array_key_exists("age",$data) ? $data['age'] : ''}}">
                                    @if ($errors->has('age'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-2">
                                    Comparison
                                </div>
                                <div class="col-md-2">
                                    <select name="age_comparison"
                                            class="form-control {{ $errors->has('age_comparison') ? ' is-invalid' : '' }} arithmetic">
                                        @foreach($allowed_comparisons as $comparison)
                                            <option value="{{$comparison}}"
                                                    {{(array_key_exists("age_comparison",$data) && $data['age_comparison'] === $comparison) ? 'selected' : ''}}>
                                                {{$comparison}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('age_comparison'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('age_comparison') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="created_at"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Created At') }}</label>

                                <div class="col-md-4">
                                    <input id="created_at" type="date"
                                           class="form-control {{ $errors->has('created_at') ? ' is-invalid' : '' }}"
                                           name="created_at"
                                           value="{{array_key_exists("created_at",$data) ? $data['created_at'] : ''}}">
                                    @if ($errors->has('created_at'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('created_at') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-2">
                                    Comparison
                                </div>
                                <div class="col-md-2">
                                    <select name="created_at_comparison"
                                            class="form-control  {{ $errors->has('created_at_comparison') ? ' is-invalid' : '' }} arithmetic">
                                        @foreach($allowed_comparisons as $comparison)
                                            <option value="{{$comparison}}"
                                                    {{(array_key_exists("created_at_comparison",$data) && $data['created_at_comparison'] === $comparison) ? 'selected' : ''}}>
                                                {{$comparison}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('created_at_comparison'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('created_at_comparison') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-go">Go</button>
                            <button type="button" class="btn btn-info btn-clear">Clear</button>
                        </form>
                        @if(count ($users) > 0)
                            <table class="table table-striped mt-3">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Email</th>
                                    <th>Created_at</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->age}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->created_at ? $user->created_at->format('Y-m-d') : "-"}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        @else
                            <div class="mt-3">
                                <p>No result</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/main.js')}}"></script>
@endsection
