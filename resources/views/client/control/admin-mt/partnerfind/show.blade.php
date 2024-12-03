@extends('client/control/admin-mt/inc/app')
@section('title')
{{ $findPartner->name }} & {{ $findPartner->title }}-MT
@endsection
@section('content')
<div class="section__content section__content--p30">
    <div class="container-fluid">
        <h3 class="text-success text-center">Partner Details</h3>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Partner Information</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>Title:</th>
                                <td>{{ $findPartner->title }}</td>
                            </tr>
                            <tr>
                                <th>Name:</th>
                                <td>{{ $findPartner->name }}</td>
                            </tr>
                            <tr>
                                <th>Father's Name:</th>
                                <td>{{ $findPartner->fathers_name }}</td>
                            </tr>
                            <tr>
                                <th>Mother's Name:</th>
                                <td>{{ $findPartner->mothers_name }}</td>
                            </tr>
                            <tr>
                                <th>Age:</th>
                                <td>{{ $findPartner->age }}</td>
                            </tr>
                            <tr>
                                <th>Profession:</th>
                                <td>{{ $findPartner->profession }}</td>
                            </tr>
                            <tr>
                                <th>Marital Status:</th>
                                <td>{{ $findPartner->marital_status }}</td>
                            </tr>
                            <tr>
                                <th>Description:</th>
                                <td>{!! $findPartner->description !!}</td>
                            </tr>
                            <tr>
                                <th>Contact Number:</th>
                                <td>{{ $findPartner->contact_number }}</td>
                            </tr>
                            <tr>
                                <th>Partner Image:</th>
                                <td>
                                    @if ($findPartner->image)
                                        <img src="{{ asset('storage/app/public/' . $findPartner->image) }}" alt="Partner Image" style="height: 100px;">
                                    @else
                                        <p>No image available</p>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Bio Data:</th>
                                <td>
                                    @if ($findPartner->bio_data)
                                        <a href="{{ asset('storage/app/public/' . $findPartner->bio_data) }}" target="_blank">View Bio Data</a>
                                    @else
                                        <p>No bio data available</p>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Marital Status:</th>
                                <td>{{ $findPartner->find_type == 1 ? 'Married' : 'Not Married' }}</td>
                            </tr>
                        </table>

                        <a href="{{ route('find_partner.edit', $findPartner->id) }}" class="btn btn-primary">Edit Partner</a>
                        <form action="{{ route('find_partner.destroy', $findPartner->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete Partner</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
