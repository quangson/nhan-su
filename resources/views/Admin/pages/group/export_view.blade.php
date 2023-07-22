
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên Khoa/Phòng</th>
                                    <th>Số thành viên</th>
                               
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $group->id }}</td>
                                        <td>{{ $group->name }}</td>
                                        <td>{{ count($group->employees) }}</td>
                                    </tr>
                                
                                </tbody>
                            </table>
                     