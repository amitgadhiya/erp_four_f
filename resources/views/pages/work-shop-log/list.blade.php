@extends('layouts.default')

@section('title')
    Work show data convertion
@endsection

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-end">
            <a href="{{ route('work-shop-log.add') }}" class="btn btn-primary">Add Work Log</a>
        </div>
    </div>
    <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Project No</th>
                    <th>Date</th>
                    <th>User</th>
                    <th>Work Description</th>
                    <th>Work Category</th>
                    <th>Elements</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                $workLogs = [
                    (object) [
                        'id' => 1,
                        'project_no' => 'P-001',
                        'date' => '2024-12-01',
                        'user' => 'Rohan',
                        'work_desc' => 'Created wireframes for the new website design.',
                        'work_category' => 'Cutting',
                        'elements' => "10",
                        'start_time' => '09:00',
                        'end_time' => '11:30',
                        'total' => '2h 30m',
                    ],
                    (object) [
                        'id' => 2,
                        'project_no' => 'P-002',
                        'date' => '2024-12-01',
                        'user' => 'Rahul',
                        'work_desc' => 'Reviewed the design with the client and gathered feedback.',
                        'work_category' => 'Eatching',
                        'elements' => "10",
                        'start_time' => '12:00',
                        'end_time' => '13:15',
                        'total' => '1h 15m',
                    ],
                    (object) [
                        'id' => 3,
                        'project_no' => 'P-003',
                        'date' => '2024-12-02',
                        'user' => 'user name',
                        'work_desc' => 'Updated the design based on client feedback.',
                        'work_category' => 'Revisions',
                        'elements' => "10",
                        'start_time' => '10:00',
                        'end_time' => '12:30',
                        'total' => '2h 30m',
                    ],
                    (object) [
                        'id' => 4,
                        'project_no' => 'P-004',
                        'date' => '2024-12-02',
                        'user' => 'user name',
                        'work_desc' => 'Prepared assets for the development team.',
                        'work_category' => 'Blacking',
                        'elements' => "10",
                        'start_time' => '14:00',
                        'end_time' => '16:00',
                        'total' => '2h 0m',
                    ],
                    (object) [
                        'id' => 5,
                        'project_no' => 'P-005',
                        'date' => '2024-12-03',
                        'user' => 'user name 2',
                        'work_desc' => 'Finalized design and shared it with stakeholders.',
                        'work_category' => 'Finalization',
                        'elements' => "10",
                        'start_time' => '09:30',
                        'end_time' => '11:00',
                        'total' => '1h 30m',
                    ],
                    (object) [
                        'id' => 6,
                        'project_no' => 'P-006',
                        'date' => '2024-12-03',
                        'user' => 'Diana White',
                        'work_desc' => 'Worked on a prototype for testing.',
                        'work_category' => 'Hardning',
                        'elements' => "10",
                        'start_time' => '13:00',
                        'end_time' => '16:45',
                        'total' => '3h 45m',
                    ],
                ];
                @endphp
                @forelse($workLogs as $log)
                    <tr>
                        <td>{{ $log->project_no }}</td>
                        <td>{{ $log->date }}</td>
                        <td>{{ $log->user }}</td>
                        <td>{{ $log->work_desc }}</td>
                        <td>{{ $log->work_category }}</td>
                        <td>{{ $log->elements }}</td>
                        <td>{{ $log->start_time }}</td>
                        <td>{{ $log->end_time }}</td>
                        <td>{{ $log->total }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No records found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
