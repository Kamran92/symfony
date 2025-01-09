<script setup>
import { ref } from "vue";

const mail = ref("loki");
const password = ref("loki");

const createUser = async () => {
  const response = await fetch("/api/create-user", {
    method: "POST",
    body: JSON.stringify({ mail: mail.value, password: password.value }),
  });

  const json = await response.json();

  console.log(json);
};
</script>

<template>
  <main>
    <h1>Регистрация</h1>
    <label>
      <span>почта</span>
      <input v-model="mail" type="text" />
    </label>

    <br />

    <label>
      <span>пароль</span>
      <input v-model="password" type="text" />
    </label>

    <br />

    <button @click="createUser">зарегистрироваться</button>
  </main>
</template>
