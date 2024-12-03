
@extends('/admin-mt/app')
@section('title')
Our-All-Service-MT
@endsection
@section('admin-content')


            <!-- MAIN CONTENT-->
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="text-center text-success">Our Services</h3>
                                <a class="btn btn-primary" href="{{ route('our_services.create') }}">Create New Service</a>
                                <table id="services-table" class="display">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Demo Link</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($services as $service)
                                        <tr>
                                            <td>{{ $service->title }}</td>
                                            <td>{{ Str::limit($service->description, 30) }}</td>
                                            <td>{{ $service->price }}</td>
                                            <td><a class="btn btn-secondary" href="{{ $service->demo_link }}" target="_blank">Go To</a></td>
                                            <td>
                                                <a class="btn btn-success" href="{{ route('our_services.show', $service->id) }}">View</a>
                                                <a class="btn btn-warning" href="{{ route('our_services.edit', $service->id) }}">Edit</a>
                                                <form action="{{ route('our_services.destroy', $service->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTAINER-->

    </div>

   @endsection