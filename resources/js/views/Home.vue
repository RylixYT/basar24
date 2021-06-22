<template>
    <div>
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Dashboard</h2>
            </div>
        </div>
        <!-- Forms -->
        <section class="no-padding-top">
            <div class="container-fluid">
                <div class="row">
                    <!-- Basic Form-->
                    <div class="col-lg-12">
                        <div class="block">
                            <div class="title">
                                <strong class="d-block">Basic Form</strong>
                                <span class="d-block"
                                    >Lorem ipsum dolor sit amet
                                    consectetur.</span
                                >
                            </div>
                            <div class="block-body">
                                <form>
                                    <div class="form-group">
                                        <label class="form-control-label"
                                            >Email</label
                                        >
                                        <input
                                            type="email"
                                            placeholder="Email Address"
                                            class="form-control"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label"
                                            >Password</label
                                        >
                                        <input
                                            type="password"
                                            placeholder="Password"
                                            class="form-control"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="submit"
                                            value="Signin"
                                            class="btn btn-primary"
                                        />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="block margin-bottom-sm">
                    <div class="title">
                        <strong>Striped Table</strong><br />
                        <span class="d-block">
                            Zum editieren einfach in die Tabellenzelle tippen.
                        </span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td><input type="text" /></td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i> Löschen
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {};
</script>

<style>
td input {
    all: unset;
    width: 100%;
}
</style>
