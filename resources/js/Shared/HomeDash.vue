<template>
<div id="no-app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">

            <inertia-link class="navbar-brand" href="/">SAMBA</inertia-link>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <inertia-link href="/login" class="navbar-brand">login</inertia-link>
                    <inertia-link href="/register" class="navbar-brand">Register</inertia-link>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <slot />
    </main>

</div>
</template>

<script>
export default {

}
</script>
