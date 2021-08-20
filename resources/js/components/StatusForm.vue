<template>
    <div>

        <form @submit.prevent="submit">
            <div class="card">
                <div class="card-body">
                    <textarea v-model="body" class="form-control border-0" name="body"
                              placeholder="Qué estás pensando?"></textarea>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit" id="create-status">Publish</button>
                </div>
            </div>
        </form>
        <div v-for="status in statuses" v-text="status.body"></div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            body: '',
            statuses: []
        }
    },
    methods: {
        submit() {
            axios.post('/statuses', {body: this.body})
                .then(res => {
                    this.statuses.push(res.data)
                    this.body = ''
                })
                .catch(err => console.log(err.response.data))
        }
    }
}
</script>

<style scoped>

</style>
