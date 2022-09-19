<script setup>
import { ref } from "vue";
import DataTable from "primevue/datatable";
import Column from "primevue/column";

const criteria = ref([
    {
        linguistic: "Equally Important",
        scale: 1,
        trangular_fuzzy_numbers: "1,1,1",
    },
    {
        linguistic: "Moderately more important",
        scale: 3,
        trangular_fuzzy_numbers: "2,3,4",
    },
    {
        linguistic: "Strongly more important",
        scale: 5,
        trangular_fuzzy_numbers: "4,5,6",
    },
    {
        linguistic: "Very Strongly more important",
        scale: 7,
        trangular_fuzzy_numbers: "6,7,8",
    },
    {
        linguistic: "Extremely more important",
        scale: 9,
        trangular_fuzzy_numbers: "8,9,9",
    },
]);
</script>

<template>
    <DataTable :value="criteria" responsiveLayout="scroll">
        <Column field="linguistic" header="Linguistic"></Column>
        <Column field="scale" header="Scale"></Column>
        <Column
            field="trangular_fuzzy_numbers"
            header="Trangular Fuzzy Numbers"
        ></Column>
    </DataTable>
</template>
