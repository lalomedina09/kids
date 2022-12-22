<div id="{{ str_slug(__('My personal profile')) }}" class="tab-pane">
    <h5 class="text-danger text-uppercase mb-5">@lang('My personal profile')</h5>

    <form action="{{ route('profile.update', ['personal']) }}" method="post"
        id="form-personal" class="form-custom">
        @csrf

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-12">
                <div class="form-group">
                    <label for="username" class="control-label text-uppercase">* @lang('Username')</label>
                    <input type="text" name="username" class="form-control"
                        data-label="letters" data-limit="50"
                        placeholder="@lang('e.g.') juanperez_01"
                        value="{{ $user->getMeta('blog', 'username') }}">

                    @if ($errors->has('username'))
                        <span class="small text-danger">{{ $errors->first('username') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="job" class="control-label text-uppercase">* @lang('Job')</label>
                    <input type="text" name="job" class="form-control"
                        data-label="letters" data-limit="100"
                        placeholder="@lang('e.g.') Gurú financiero"
                        value="{{ $user->getMeta('blog', 'job') }}">

                    @if ($errors->has('job'))
                        <span class="small text-danger">{{ $errors->first('job') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="bio" class="control-label text-uppercase">* @lang('Biography')</label>
                    <textarea name="bio" rows="10"
                        id="user_bio" class="form-control"
                        data-label="letters" data-limit="1000">{{ $user->getMeta('blog', 'bio') }}</textarea>

                    @if ($errors->has('bio'))
                        <span class="small text-danger">{{ $errors->first('bio') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-12">
                <div class="form-group">
                    <label class="control-label text-uppercase">Facebook</label>
                    <input type="text" name="facebook" class="form-control"
                        placeholder="@lang('e.g.') https://facebook.com/facebook"
                        value="{{ $user->getMeta('blog', 'facebook') }}">

                    @if ($errors->has('facebook'))
                        <span class="small text-danger">{{ $errors->first('facebook') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label class="control-label text-uppercase">Twitter</label>
                    <input type="text" name="twitter" class="form-control"
                        placeholder="@lang('e.g.') https://twitter.com/twitter"
                        value="{{ $user->getMeta('blog', 'twitter') }}">

                    @if ($errors->has('twitter'))
                        <span class="small text-danger">{{ $errors->first('twitter') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label class="control-label text-uppercase">Instagram</label>
                    <input type="text" name="instagram" class="form-control"
                        placeholder="@lang('e.g.') https://instagram.com/instagram"
                        value="{{ $user->getMeta('blog', 'instagram') }}">

                    @if ($errors->has('instagram'))
                        <span class="small text-danger">{{ $errors->first('instagram') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label class="control-label text-uppercase">Tiktok</label>
                    <input type="text" name="tiktok" class="form-control"
                        placeholder="@lang('e.g.') https://tiktok.com/tiktok"
                        value="{{ $user->getMeta('blog', 'tiktok') }}">

                    @if ($errors->has('tiktok'))
                        <span class="small text-danger">{{ $errors->first('tiktok') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label class="control-label text-uppercase">LinkedIn</label>
                    <input type="text" name="linkedin" class="form-control"
                        placeholder="@lang('e.g.') https://linkedin.com/in/user"
                        value="{{ $user->getMeta('blog', 'linkedin') }}">

                    @if ($errors->has('linkedin'))
                        <span class="small text-danger">{{ $errors->first('linkedin') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label class="control-label text-uppercase">YouTube</label>
                    <input type="text" name="youtube" class="form-control"
                        placeholder="@lang('e.g.') https://youtube.com/YouTube"
                        value="{{ $user->getMeta('blog', 'youtube') }}">

                    @if ($errors->has('youtube'))
                        <span class="small text-danger">{{ $errors->first('youtube') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <p class="small font-italic">
            (*) @lang('The field is required')
        </p>

        @if($user->hasAnyRole(['advisor']))
            <hr>

            <div class="row">
                <div class="col-xl-6 col-lg-6 col-12">
                    <h5 class="text-danger text-uppercase mb-4">@lang('Education')</h5>

                    <div class="form-row">
                        <div class="form-group col-xl-6 col-lg-6 col-12">
                            <label for="education_start_date" class="control-label text-uppercase">* @lang('Start date')</label>
                            <input type="date" name="education[start_date]"
                                id="education_start_date" class="form-control datetimepicker-input"
                                value="{{ array_get($education, 'start_date', '') }}"
                                data-target="#education_start_date" data-toggle="datetimepicker">

                            @if ($errors->has('education.start_date'))
                                <span class="small text-danger">{{ $errors->first('education.start_date') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-xl-6 col-lg-6 col-12">
                            <label for="education_end_date" class="control-label text-uppercase">* @lang('End date')</label>
                            <input type="date" name="education[end_date]"
                                id="education_end_date" class="form-control datetimepicker-input"
                                value="{{ array_get($education, 'end_date', '') }}"
                                data-target="#education_end_date" data-toggle="datetimepicker">

                            @if ($errors->has('education.end_date'))
                                <span class="small text-danger">{{ $errors->first('education.end_date') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-12">
                            <label for="education_school_name" class="control-label text-uppercase">* @lang('School name')</label>
                            <input type="text" name="education[school_name]"
                                id="education_school_name" class="form-control"
                                value="{{ array_get($education, 'school_name', '') }}"
                                data-label="letters" data-limit="50">

                            @if ($errors->has('education.school_name'))
                                <span class="small text-danger">{{ $errors->first('education.school_name') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-12">
                            <label for="education_school_degree" class="control-label text-uppercase">* @lang('Degree')</label>
                            <input type="text" name="education[degree]"
                                id="education_school_degree" class="form-control"
                                value="{{ array_get($education, 'degree', '') }}"
                                data-label="letters" data-limit="50">

                            @if ($errors->has('education.degree'))
                                <span class="small text-danger">{{ $errors->first('education.degree') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-12">
                    <h5 class="text-danger text-uppercase mb-4">@lang('Work experience')</h5>

                    <div class="form-row">
                        <div class="form-group col-xl-6 col-lg-6 col-12">
                            <label for="profession_start_date" class="control-label text-uppercase">* @lang('Start date')</label>
                            <input type="date" name="profession[start_date]"
                                id="profession_start_date" class="form-control datetimepicker-input"
                                value="{{ array_get($profession, 'start_date', '') }}"
                                data-target="#profession_start_date" data-toggle="datetimepicker">

                            @if ($errors->has('profession.start_date'))
                                <span class="small text-danger">{{ $errors->first('profession.start_date') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-xl-6 col-lg-6 col-12">
                            <label for="profession_end_date" class="control-label text-uppercase">* @lang('End date')</label>
                            <input type="date" name="profession[end_date]"
                                id="profession_end_date" class="form-control datetimepicker-input"
                                value="{{ array_get($profession, 'end_date', '') }}"
                                data-target="#profession_end_date" data-toggle="datetimepicker">

                            @if ($errors->has('profession.end_date'))
                                <span class="small text-danger">{{ $errors->first('profession.end_date') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-12">
                            <label for="profession_company_name" class="control-label text-uppercase">* @lang('Company name')</label>
                            <input type="text" name="profession[company_name]"
                                id="profession_company_name" class="form-control"
                                value="{{ array_get($profession, 'company_name', '') }}"
                                data-label="letters" data-limit="50">

                            @if ($errors->has('profession.company_name'))
                                <span class="small text-danger">{{ $errors->first('profession.company_name') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-12">
                            <label for="profession_job" class="control-label text-uppercase">* @lang('Job')</label>
                            <input type="text" name="profession[job]"
                                id="profession_job" class="form-control"
                                value="{{ array_get($profession, 'job', '') }}"
                                data-label="letters" data-limit="50">

                            @if ($errors->has('profession.job'))
                                <span class="small text-danger">{{ $errors->first('profession.job') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-12">
                    <div class="form-group">
                        <label for="certifications" class="control-label text-uppercase">* @lang('Certifications')</label>
                        <textarea name="certifications" rows="10"
                            id="certifications" class="form-control"
                            data-label="letters" data-limit="300">{{ $user->getMeta('blog', 'certifications') }}</textarea>

                        @if ($errors->has('certifications'))
                            <span class="small text-danger">{{ $errors->first('certifications') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-12">
                    <div class="form-group">
                        <label for="video" class="control-label text-uppercase">* @lang('Video')</label>
                        <input type="text" name="video" class="form-control"
                            placeholder="@lang('e.g.') https://www.youtube.com/watch?v=su8oRFpKLDA"
                            value="{{ $user->getMeta('blog', 'video') }}">

                        @if ($errors->has('video'))
                            <span class="small text-danger">{{ $errors->first('video') }}</span>
                        @endif
                    </div>
                    @if ($user->hasMeta('blog', 'video'))
                        {!! EmbedVideo::getEmbedVideoCode($user->getMeta('blog', 'video')) !!}
                    @endif
                </div>
            </div>
        @endif

        <p class="small font-italic">
            (*) @lang('The field is required')
        </p>

        <hr>

        <div class="form-group text-center">
            <input type="submit" value="@lang('Save changes')" class="btn btn-danger btn-pill">
        </div>
    </form>
</div>
