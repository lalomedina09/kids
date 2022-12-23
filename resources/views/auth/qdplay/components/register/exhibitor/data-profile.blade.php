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
                                    id="user_bio" class="form-control text-white"
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
                                        <span class="input-group-text">
                                            <i class="lni lni-linkedin"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="linkedin" class="form-control"
                                    placeholder="@lang('e.g.') https://www.linkedin.com/in/@user"
                                        value="">
                                </div>

                                @if ($errors->has('linkedin'))
                                    <span class="small text-danger">{{ $errors->first('linkedin') }}</span>
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

                    <!----------------------------------------------------------------------------------->
                    <!---------------------------------------------------------------------------------->
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-danger btn-pill">@lang('Next')</button>
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

