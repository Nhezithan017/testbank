<template>
    <div>
        <form @submit.prevent="saveQuestions()">
            <div class="row">
                <button class="btn btn-primary"  @click="addQuestion()"> + Add Question</button>
            </div>
              <div v-for="(questions, index) in question" :key="questions.id"> 
            <div class="row">
                <div class="form-group col-sm">
                      <a @click="removeQuestion(index)" href="">Remove</a>
                  <label for="">Question</label>
                {{ index + 1}}  <input type="text"
                    class="form-control" v-model="questions.question" :ref="questions.question" placeholder="Insert Question">
                </div>   
            </div>
            <div class="row">
                <div class="input-group col-sm-6">
                  <span class="input-group-addon col-sm-1"> 
                  <input type="radio" value="A" v-model="questions.answer" :checked="questions.answer == 'A'">
                  </span>
                  <input type="text" class="form-control"  v-model="questions.A">
                </div>
                <div class="input-group col-sm-6">
                  <span class="input-group-addon col-sm-1">
                    <input type="radio" value="C" v-model="questions.answer"  :checked="questions.answer == 'C'">
                  </span>
                  <input type="text" class="form-control"  v-model="questions.C">
                </div>
            </div>
               <div class="row mt-2">
                <div class="input-group col-sm-6">
                  <span class="input-group-addon col-sm-1">
                    <input type="radio"  value="B" v-model="questions.answer"  :checked="questions.answer == 'B'">
                  </span>
                  <input type="text" class="form-control"  v-model="questions.B">
                </div>
                <div class="input-group col-sm-6">
                  <span class="input-group-addon col-sm-1">
                    <input type="radio"  value="D" v-model="questions.answer"  :checked="questions.answer == 'D'">
                  </span>
                  <input type="text" class="form-control"  v-model="questions.D" >
                </div>
            </div>
              <hr>
        </div> 
          
            <button type="submit" class="btn btn-success">Save</button>
            <div>{{ feedback }}</div>
              <ul>
                <li v-for="(error, index) in errors" :key="index">{{ error}}</li>
              </ul>
        </form>
        </div>
</template>

<script>
export default {
    props:['questions','courses_id'],
    data(){
        return{
            question: _.cloneDeep(this.questions),
            feedback: '',
            errors: []
        }
    },
    methods: {
        addQuestion(){
            this.question.push({
                id: 0,
                question: '',
                A: '',
                B: '',
                C: '',
                D: '',
                answer: '',
                course_id: this.course_id
            });
            this.$nextTick(() => {
                window.scrollTo(0, document.body.scrollHeight);
                this.$refs[''][0].focus();
            });
        },
        saveQuestions(){
          axios.post('/api/question/upsert', {
              questions: this.question
          })
          .then((res) =>{
            if(res.data.success){
              this.feedback = 'Save changes';
              this.question = res.data.questions;
            }
          })
          .catch(error =>{
            let messages = Object.values(error.response.data.errors);
            this.errors = [].concat.apply([], messages);
          });
        },
        removeQuestion(index){
           if(confirm('Are you sure')){
             let id = this.question[index].id;

             if(id > 0){
               axios.delete('/api/question/' + id);
             }

             this.question.splice(index, 1);
           }
        }
       
    }
}
</script>

<style scoped>
    hr {
        margin: 20px;
    }
</style>
