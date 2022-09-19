<script setup>
import { ref } from "vue";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import ColumnGroup from "primevue/columngroup"; //optional for column grouping
import Row from "primevue/row"; //optional for row

const types = ref([
    {
        linguistic: "Type of Materials",
        scale: 1,
    },
    {
        linguistic: "Type of Usage",
        scale: 3,
    },
    {
        linguistic: "Environmental Profile",
        scale: 5,
    },
    {
        linguistic: "Consumer/Marketing Issues",
        scale: 7,
    },
    {
        linguistic: "Properties",
        scale: 9,
    },
]);

const criteria = ref([
    {
        name: "Equally Important",
        value: 1,
    },
    {
        name: "Moderately more important",
        value: 3,
    },
    {
        name: "Strongly more important",
        value: 5,
    },
    {
        name: "Very Strongly more important",
        value: 7,
    },
    {
        name: "Extremely more important",
        value: 9,
    },
]);

const selectedCriteria = ref();
</script>

<template>
    <DataTable :value="types" responsiveLayout="scroll">
        <Column field="linguistic"></Column>
        <Column field="scale" header="Linguistic Scale">
            <template #body="slotProps">
                <Dropdown
                    v-model="selectedCriteria"
                    :options="criteria"
                    optionLabel="name"
                    optionValue="value"
                    placeholder="Select a criteria"
                />
            </template>
        </Column>
    </DataTable>
</template>
