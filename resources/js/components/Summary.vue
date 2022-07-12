<template>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Number</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">Old</th>
                <td
                    v-for="(person, index) in population"
                    :key="index"
                    :value="person.id"
                ></td>
            </tr>
            <tr>
                <th scope="row">Young</th>
                <td>4</td>
            </tr>
            <tr>
                <th scope="row">Child</th>
                <td>55</td>
            </tr>
        </tbody>
    </table>
</template>