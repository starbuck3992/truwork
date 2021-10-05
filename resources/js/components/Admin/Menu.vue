<template>
    <div>
        <ul>
            <li>
                <router-link :to="{ name: 'homeIndex' }">Domů</router-link>
            </li>
            <li>
                <router-link :to="{ name: 'dashboardIndex' }">Dashboard
                </router-link>
            </li>

        </ul>
    </div>
</template>
