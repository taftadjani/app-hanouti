<div class="table-container">
    <div class="search-wrapper">
        <div id="search-root"></div>
    </div>
    <div class="table-wrapper">
        <table class="content-table table-sortable" id="data-table">
            <thead>
                <tr>
                    <th>
                        <span>First name</span>
                        <span class="material-icons">unfold_more</span>
                    </th>
                    <th>
                        <span>Last name</span>
                        <span class="material-icons">unfold_more</span>
                    </th>
                    <th>
                        <span>Email</span>
                        <span class="material-icons">unfold_more</span>
                    </th>
                    <th>
                        <span>Gender</span>
                        <span class="material-icons">unfold_more</span>
                    </th>
                    <th>
                        <span>Phone</span>
                        <span class="material-icons">unfold_more</span>
                    </th>
                    <th>
                        <span>Live at</span>
                        <span class="material-icons">unfold_more</span>
                    </th>
                    <th>
                        <span>Nationality</span>
                        <span class="material-icons">unfold_more</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->gender}}</td>
                        <td>({{$user->indicatif}}) {{$user->phone}}</td>
                        <td>{{$user->city->name}}</td>
                        <td>{{$user->country->name}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
