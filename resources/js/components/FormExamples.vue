<template>
    <!-- Form Elements -->
    <div class="col-lg-12">
        <div class="block">
            <div class="title"><strong>All form elements</strong></div>
            <div class="block-body">
                <form class="form-horizontal">
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">
                            Normal
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">
                            Help text
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" /><small
                                class="help-block-none"
                                >A block of help text that breaks onto a new
                                line and may extend beyond one line.</small
                            >
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label"
                            >Checkboxes &amp; radios <br /><small
                                class="text-primary"
                                >Custom elements</small
                            ></label
                        >
                        <div class="col-sm-9">
                            <div class="i-checks">
                                <input
                                    id="checkboxCustom1"
                                    type="checkbox"
                                    value=""
                                    class="checkbox-template"
                                />
                                <label for="checkboxCustom1">Checkbox</label>
                            </div>
                            <div class="i-checks">
                                <input
                                    id="radioCustom1"
                                    type="radio"
                                    value="option1"
                                    name="a"
                                    class="radio-template"
                                />
                                <label for="radioCustom1">Radio</label>
                            </div>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label"
                            >Select</label
                        >
                        <div class="col-sm-9">
                            <select
                                name="account"
                                class="form-control mb-3 mb-3"
                            >
                                <option>option 1</option>
                                <option>option 2</option>
                                <option>option 3</option>
                                <option>option 4</option>
                            </select>
                        </div>
                        <div class="col-sm-9 ml-auto">
                            <select multiple="" class="form-control">
                                <option>option 1</option>
                                <option>option 2</option>
                                <option>option 3</option>
                                <option>option 4</option>
                            </select>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row has-success">
                        <label class="col-sm-3 form-control-label"
                            >Input with success</label
                        >
                        <div class="col-sm-9">
                            <input type="text" class="form-control is-valid" />
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row has-danger">
                        <label class="col-sm-3 form-control-label"
                            >Input with error</label
                        >
                        <div class="col-sm-9">
                            <input
                                type="text"
                                class="form-control is-invalid"
                            />
                            <div class="invalid-feedback">
                                Please provide your name.
                            </div>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label"
                            >Column sizing</label
                        >
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-md-3">
                                    <input
                                        type="text"
                                        placeholder=".col-md-3"
                                        class="form-control"
                                    />
                                </div>
                                <div class="col-md-4">
                                    <input
                                        type="text"
                                        placeholder=".col-md-4"
                                        class="form-control"
                                    />
                                </div>
                                <div class="col-md-5">
                                    <input
                                        type="text"
                                        placeholder=".col-md-5"
                                        class="form-control"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="row">
                        <label class="col-sm-3 form-control-label"
                            >Material Inputs</label
                        >
                        <div class="col-sm-9">
                            <div class="form-group-material">
                                <input
                                    id="register-username"
                                    type="text"
                                    name="registerUsername"
                                    required
                                    class="input-material"
                                />
                                <label
                                    for="register-username"
                                    class="label-material"
                                    >Username</label
                                >
                            </div>
                            <div class="form-group-material">
                                <input
                                    id="register-email"
                                    type="email"
                                    name="registerEmail"
                                    required
                                    class="input-material"
                                />
                                <label
                                    for="register-email"
                                    class="label-material"
                                    >Email Address
                                </label>
                            </div>
                            <div class="form-group-material">
                                <input
                                    id="register-password"
                                    type="password"
                                    name="registerPassword"
                                    required
                                    class="input-material"
                                />
                                <label
                                    for="register-password"
                                    class="label-material"
                                    >Password
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label"
                            >Input groups</label
                        >
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                    </div>
                                    <input
                                        type="text"
                                        placeholder="Username"
                                        class="form-control"
                                    />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" />
                                    <div class="input-group-append">
                                        <span class="input-group-text"
                                            >.00</span
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="text" class="form-control" />
                                    <div class="input-group-append">
                                        <span class="input-group-text"
                                            >.00</span
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label"
                            >Button addons</label
                        >
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" />
                                    <div class="input-group-append">
                                        <button
                                            type="button"
                                            class="btn btn-primary"
                                        >
                                            Go!
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                        <div class="col-sm-9 ml-auto">
                            <button type="submit" class="btn btn-secondary">
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Save changes
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {};
</script>

<style></style>
