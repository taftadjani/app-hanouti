<div class="container">
    <div class="user-details-container">
        <form action="{{route('profile.update', ['id'=>Auth::id()]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="top-title">
                <div class="left-title">
                    <span>User details</span>
                </div>
                <div class="right-actions">
                    <button class="btn global {{ $updating?'active':'' }}  cancel">Cancel</button>
                    <button class="btn global {{ $updating?'active':'' }} save" type="submit">Save</button>
                </div>
            </div>
            <div class="bottom-details">
                <div class="left-details">
                    <div class="content first-name">
                        <div class="title">First name</div>
                        <div class="value-container {{ $updating?'have-save have-cancel':'have-update' }}">
                            <div class="value">
                                <input type="text" name="first_name" value="{{ $user->first_name }}" {{ $updating?"enable":'disabled' }}>
                            </div>
                            <div class="actions">
                                <button class="update">
                                <span class="material-icons">system_update_alt</span>
                                <span>update</span>
                                </button>
                                <button class="save f_n">
                                <span class="material-icons">check</span>
                                <span>save</span>
                                </button>
                                <button class="cancel">
                                <span class="material-icons-outlined">cancel</span>
                                <span>cancel</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="content last-name">
                        <div class="title">Last name</div>
                        <div class="value-container {{ $updating?'have-save have-cancel':'have-update' }}">
                            <div class="value">
                                <input type="text" name="last_name" value="{{ $user->last_name }}" {{ $updating?"enable":'disabled' }}>
                            </div>
                            <div class="actions">
                                <button class="update">
                                <span class="material-icons">system_update_alt</span>
                                <span>update</span>
                                </button>
                                <button class="save l_n">
                                <span class="material-icons">check</span>
                                <span>save</span>
                                </button>
                                <button class="cancel">
                                <span class="material-icons-outlined">cancel</span>
                                <span>cancel</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="content nick-name">
                        <div class="title">Nickname</div>
                        <div class="value-container {{ $updating?'have-save have-cancel':'have-update' }}">
                            <div class="value">
                                <input type="text" name="nick_name" value="{{ $user->nick_name }}" {{ $updating?"enable":'disabled' }}>
                            </div>
                            <div class="actions">
                                <button class="update">
                                <span class="material-icons">system_update_alt</span>
                                <span>update</span>
                                </button>
                                <button class="save n_n">
                                <span class="material-icons">check</span>
                                <span>save</span>
                                </button>
                                <button class="cancel">
                                <span class="material-icons-outlined">cancel</span>
                                <span>cancel</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="content email">
                        <div class="title">Email</div>
                        <div class="value-container {{ $updating?'have-save have-cancel':'have-update' }}">
                            <div class="value">
                                <input type="email" name="email" value="{{ $user->email }}" {{ $updating?"enable":'disabled' }}>
                            </div>
                            <div class="actions">
                                <button class="update">
                                <span class="material-icons">system_update_alt</span>
                                <span>update</span>
                                </button>
                                <button class="delete">
                                <span class="material-icons">delete_outline</span>
                                <span>delete</span>
                                </button>
                                <button class="add">
                                <span class="material-icons">add</span>
                                <span>add</span>
                                </button>
                                <button class="save">
                                <span class="material-icons">check</span>
                                <span>save</span>
                                </button>
                                <button class="cancel">
                                <span class="material-icons-outlined">cancel</span>
                                <span>cancel</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="content phone">
                        <div class="title">Phone</div>
                        <div class="value-container phone {{ $updating?'have-save have-cancel':'have-update' }}">
                            <div class="value">
                                <select name="indicatif" id="indicatif" {{ $updating?"enable":'disabled' }}>
                                    <option value="+235">+ 235</option>
                                    <option value="+212">+ 212</option>
                                    <option value="+1">+ 1</option>
                                    <option value="+237">+ 237</option>
                                    <option value="+74">+ 74</option>
                                </select>
                                <input type="tel" name="phone" value="623110288" {{ $updating?"enable":'disabled' }}>
                            </div>
                            <div class="actions">
                                <button class="update">
                                <span class="material-icons">system_update_alt</span>
                                <span>update</span>
                                </button>
                                <button class="delete">
                                <span class="material-icons">delete_outline</span>
                                <span>delete</span>
                                </button>
                                <button class="add">
                                <span class="material-icons">add</span>
                                <span>add</span>
                                </button>
                                <button class="save ph">
                                <span class="material-icons">check</span>
                                <span>save</span>
                                </button>
                                <button class="cancel">
                                <span class="material-icons-outlined">cancel</span>
                                <span>cancel</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="content birthday">
                        <div class="title">Birthday</div>
                        <div class="value-container {{ $updating?'have-save have-cancel':'have-update' }}">
                            <div class="value">
                                <input type="date" name="birthday" value="{{ $user->birthday }}" {{ $updating?"enable":'disabled' }}>
                            </div>
                            <div class="actions">
                                <button class="update">
                                <span class="material-icons">system_update_alt</span>
                                <span>update</span>
                                </button>
                                </button>
                                <button class="save bd">
                                <span class="material-icons">check</span>
                                <span>save</span>
                                </button>
                                <button class="cancel">
                                <span class="material-icons-outlined">cancel</span>
                                <span>cancel</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="title">Password</div>
                        <div class="value-container  have-update">
                            <div class="value">
                                <input type="password" name="password" value="********" disabled>
                            </div>
                            <div class="actions">
                                <button class="update">
                                <span class="material-icons">system_update_alt</span>
                                <span>update</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right-details">
                    <div class="title">Avatar</div>
                    <div class="content-avatar">
                        <img class="img-container" src="{{ url('/uploads/images/'.$user->avatar) }}" alt="avatar"></img>
                        <div class="right-actions">
                            <button>
                            <span class="material-icons">face</span>
                            <span>icons</span>
                            </button>
                            <button>
                            <span class="material-icons">mood</span>
                            <span>emoji</span>
                            </button>
                        </div>
                        <label for="avatar-input" id="label-avatar-input">
                            <span class="material-icons">photo</span>
                            <span>upload an image</span>
                        </label>
                        <input type="file" name="avatar" value="" id="avatar-input">
                    </div>
                </div>
            </div>
        </form>
        <form id='single-update' method="POST" style="display: none;">
        </form>
    </div>
</div>
