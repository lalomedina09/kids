<p class="text-danger text-uppercase text-center mb-0">
    Casi eres parte de nuestra comunidad de expertos
</p>
<p class="modal__title text-uppercase text-center mb-5 text-green">
    Vamos a preparar tu perfil
</p>

<div id="register-wrapper">
    <div id="register-form">
            <form action="{{ route('register.store.profile', [$user_id, 'profile']) }}" class="form-custom form-modal" method="post" id="form-register">
                @method('patch')
                @csrf
            <div id="register-general">
                <div>
                    <!---------------------------------------------------------------------------------->
                    <!---------------------------------------------------------------------------------->
                    @csrf

                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <!---------------------------->
                            <div class="form-group">
                                <label for="username" class="control-label">* @lang('Username')</label>
                                <input type="text" name="username" class="form-control"
                                    data-label="letters" data-limit="50"
                                    placeholder="@lang('e.g.') juanperez_01"
                                    value="">

                                @if ($errors->has('username'))
                                    <span class="small text-danger">{{ $errors->first('username') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="job" class="control-label">* @lang('Job')</label>
                                <input type="text" name="job" class="form-control"
                                    data-label="letters" data-limit="100"
                                    placeholder="@lang('e.g.') Gurú financiero"
                                    value="">

                                @if ($errors->has('job'))
                                    <span class="small text-danger">{{ $errors->first('job') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="bio" class="control-label">* @lang('Biography')</label>
                                <textarea name="bio" rows="10"
                                    id="user_bio" class="form-control"
                                    data-label="letters" data-limit="1000"></textarea>

                                @if ($errors->has('bio'))
                                    <span class="small text-danger">{{ $errors->first('bio') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label font-weight-bold">@lang('Social networks'):</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><span class="fa fa-facebook"></span></span>
                                    </div>
                                    <input type="text" name="facebook" class="form-control"
                                        placeholder="@lang('e.g.') https://facebook.com/facebook"
                                        value="">
                                </div>

                                @if ($errors->has('facebook'))
                                    <span class="small text-danger">{{ $errors->first('facebook') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><span class="fa fa-twitter"></span></span>
                                    </div>
                                    <input type="text" name="twitter" class="form-control"
                                        placeholder="@lang('e.g.') https://twitter.com/twitter"
                                        value="">
                                </div>

                                @if ($errors->has('twitter'))
                                    <span class="small text-danger">{{ $errors->first('twitter') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><span class="fa fa-instagram"></span></span>
                                    </div>
                                    <input type="text" name="instagram" class="form-control"
                                        placeholder="@lang('e.g.') https://instagram.com/instagram"
                                        value="">
                                </div>

                                @if ($errors->has('instagram'))
                                    <span class="small text-danger">{{ $errors->first('instagram') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="lni lni-tiktok"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="tiktok" class="form-control"
                                    placeholder="@lang('e.g.') https://www.tiktok.com/@user"
                                        value="">
                                </div>

                                @if ($errors->has('tiktok'))
                                    <span class="small text-danger">{{ $errors->first('tiktok') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><span class="fa fa-youtube-play"></span></span>
                                    </div>
                                    <input type="text" name="youtube" class="form-control"
                                        placeholder="@lang('e.g.') https://youtube.com/YouTube"
                                        value="">
                                </div>

                                @if ($errors->has('youtube'))
                                    <span class="small text-danger">{{ $errors->first('youtube') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <p class="small font-italic">
                        (*) @lang('The field is required')
                    </p>

                    <hr>

                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-12">
                            <h5 class="mb-4 text-green">@lang('Education')</h5>
                            <div class="form-row">

                                <!--<div class="form-group col-xl-6 col-lg-6 col-12">
                                <input type="date" name="birthdate"
                                    id="user-birthdate" class="form-control datetimepicker-input"
                                    data-target="#user-birthdate" data-toggle="datetimepicker">

                                @if ($errors->has('birthdate'))
                                    <span class="small text-danger">{{ $errors->first('birthdate') }}</span>
                                @endif
                                </div>-->

                                <div class="form-group col-xl-6 col-lg-6 col-12">
                                    <label for="education_start_date" class="control-label">* @lang('Start date')</label>
                                    <!--<input type="date" name="education[start_date]"
                                    id="education_start_date" class="form-control datetimepicker-input"
                                    data-target="#education_start_date" data-toggle="datetimepicker">-->
                                    <input type="date" id="education_start_date" name="education[start_date]"
                                        value="2022-12-20">
                                    @if ($errors->has('education.start_date'))
                                        <span class="small text-danger">{{ $errors->first('education.start_date') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-xl-6 col-lg-6 col-12">
                                    <label for="education_end_date" class="control-label">* @lang('End date')</label>
                                    <input type="date" name="education[end_date]"
                                        id="education_end_date">

                                    @if ($errors->has('education.end_date'))
                                        <span class="small text-danger">{{ $errors->first('education.end_date') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-12">
                                    <label for="education_school_name" class="control-label">* @lang('School name')</label>
                                    <input type="text" name="education[school_name]"
                                        id="education_school_name" class="form-control"
                                        value=""
                                        data-label="letters" data-limit="50">

                                    @if ($errors->has('education.school_name'))
                                        <span class="small text-danger">{{ $errors->first('education.school_name') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-12">
                                    <label for="education_school_degree" class="control-label">* @lang('Degree')</label>
                                    <input type="text" name="education[degree]"
                                        id="education_school_degree" class="form-control"
                                        value=""
                                        data-label="letters" data-limit="50">

                                    @if ($errors->has('education.degree'))
                                        <span class="small text-danger">{{ $errors->first('education.degree') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-12">
                            <h5 class="mb-4 text-green">@lang('Work experience')</h5>

                            <div class="form-row">
                                <div class="form-group col-xl-6 col-lg-6 col-12">
                                    <label for="profession_start_date" class="control-label">* @lang('Start date')</label>
                                    <input type="date" name="profession[start_date]"
                                        id="profession_start_date">

                                    @if ($errors->has('profession.start_date'))
                                        <span class="small text-danger">{{ $errors->first('profession.start_date') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-xl-6 col-lg-6 col-12">
                                    <label for="profession_end_date" class="control-label">* @lang('End date')</label>
                                    <input type="date" name="profession[end_date]"
                                        id="profession_end_date">

                                    @if ($errors->has('profession.end_date'))
                                        <span class="small text-danger">{{ $errors->first('profession.end_date') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-12">
                                    <label for="profession_company_name" class="control-label">* @lang('Company name')</label>
                                    <input type="text" name="profession[company_name]"
                                        id="profession_company_name" class="form-control"
                                        value=""
                                        data-label="letters" data-limit="50">

                                    @if ($errors->has('profession.company_name'))
                                        <span class="small text-danger">{{ $errors->first('profession.company_name') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-12">
                                    <label for="profession_job" class="control-label">* @lang('Job')</label>
                                    <input type="text" name="profession[job]"
                                        id="profession_job" class="form-control"
                                        value=""
                                        data-label="letters" data-limit="50">

                                    @if ($errors->has('profession.job'))
                                        <span class="small text-danger">{{ $errors->first('profession.job') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-12">
                            <div class="form-group">
                                <label for="certifications" class="control-label">* @lang('Certifications')</label>
                                <textarea name="certifications" rows="10"
                                    id="certifications" class="form-control"
                                    data-label="letters" data-limit="300"></textarea>

                                @if ($errors->has('certifications'))
                                    <span class="small text-danger">{{ $errors->first('certifications') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-12">
                            <div class="form-group">
                                <label for="video" class="control-label">* @lang('Video')</label>
                                <input type="text" name="video" class="form-control"
                                    placeholder="@lang('e.g.') https://www.youtube.com/watch?v=su8oRFpKLDA"
                                    value="">

                                @if ($errors->has('video'))
                                    <span class="small text-danger">{{ $errors->first('video') }}</span>
                                @endif
                            </div>

                        </div>

                        <div class="col-xl-6 col-lg-6 col-12">
                            <div class="form-group">
                                <label for="specialization" class="control-label">* @lang('Specialization')</label>
                                <input type="text" name="specialization" class="form-control"
                                    data-label="letters" data-limit="100"
                                    placeholder="@lang('e.g.') Inversiones en Commodities y Seguros Dotales"
                                    value="">

                                @if ($errors->has('specialization'))
                                    <span class="small text-danger">{{ $errors->first('specialization') }}</span>
                                @endif
                            </div>
                        </div>

                        <!--<div class="col-xl-6 col-lg-6 col-12">
                            <div class="form-group my-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="premium"
                                        id="advisor-is-premium" class="custom-control-input"
                                        value="">
                                    <label for="advisor-is-premium" class="custom-control-label">@lang('Premium advisor')</label>
                                </div>
                            </div>
                        </div>-->
                    </div>

                    <p class="small font-italic">
                        (*) @lang('The field is required')
                    </p>

                    <!----------------------------------------------------------------------------------->
                    <!---------------------------------------------------------------------------------->
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-danger btn-pill">@lang('Save')</button>
                    </div>
                    <div class="form-group text-right">
                        <h2 class="text-green">
                            2 / 3
                        </h2>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!--<div class="text-center">
        <p class="text-white text-xsmall mb-0">Al registrarte estás aceptando nuestros</p>
            <a href="{{ route('terms') }}" target="_blank" class="text-white text-underline text-xsmall">Términos y Condiciones</a>
        </p>
    </div>-->
</div>

