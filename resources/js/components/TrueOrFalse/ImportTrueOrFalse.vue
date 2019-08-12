<template>
    <v-app>
        <v-form>
            <v-container align-content-center>
                <v-layout>
                    <v-flex lg12>
                        <v-alert :value="showError" color="error"  outline>
                            <ul>
                                <p>Please fix the following errors:</p>
                                <li v-for="(error, index) in errors" :key="index">{{ error}}</li>
                            </ul>
                        </v-alert>
                    </v-flex>
                </v-layout>
                <v-flex xs12>
                    <v-alert :value="showFeedback" color="success"  outline>{{ feedback }}</v-alert>
                </v-flex>
                <v-layout row wrap>
                    <v-flex sm3 xs12>
                        	<select v-model="deptShow" @change="changeDept($event)" class="form-control">
				<option v-for="dept in department"  :value="dept" :key="dept.value">{{ dept.name}}</option>
			</select>
                    </v-flex>
                     <v-flex sm3 xs12>
                      	<select v-model="searchItem.course_name" class="form-control">
				<option v-for="course in deptShow.course" :value="course.name" :key="course.code">{{ course.name}}</option>
			</select>
                    </v-flex>
                     <v-flex sm2 xs12>
                        <v-select
                            :options="trim"
                            v-model="searchItem.trimester"
                            placeholder="Trimester"
                        ></v-select>
                    </v-flex>
                     <v-flex sm2 xs12>
                        <v-select
                           :options="period"
                            v-model="searchItem.period"
                            placeholder="Period"
                        ></v-select>
                    </v-flex>
                    <v-btn  @click.prevent="search()" color="primary"><v-icon>search</v-icon></v-btn>
                </v-layout>
                <v-layout row wrap>
                    <v-flex xs12>   
                            <div class="row" v-for="tof in trueorfalse" :key="tof.id">
                                <div class="col-sm-12" v-for="trueorfal in tof.trueorfalse" :key="trueorfal.id">
                               </div>
                               <v-container>
                              <v-data-table
                                    :headers="headers"
                                    :items="tof.trueorfalse"
                                    class="elevation-1"
                                >
                                    <template slot="items" slot-scope="{ item }">
                                        <td><input type="radio" @change="addImport(item.id)"></td>
                                    <td class="text-xs-left"> <input  type="radio" v-model="item.isCorrect"   value="1" :checked="item.isCorrect == 1"></td>
                                    <td class="text-xs-left"><input  type="radio" v-model="item.isCorrect"   value="0" :checked="item.isCorrect == 0"></td>
                                    <td class="text-xs-left">{{item.ques_name }}</td>
        
                                    </template>
                                </v-data-table>
                                </v-container>         
                                </div>
                         
                    </v-flex>
                  
                </v-layout>
                </v-container>
        </v-form>
    </v-app>
</template>

<script>
const trim = ['1st Trimester','2nd Trimester','3rd Trimester'];
const period = ['Prelim','Midterm','Final'];

const department = [
				{
					value: 1,
					name: 'College of Computer Studies',
					course:[
						{	
							name:'Reseach Project',
							code:'ITPROJ'
						},
						{
							
							name:'System Analysis and Design',
							code:'SAD'
						},
						]
		
				},
				{
					value: 2,
					name: 'College of Business Administration',
						course:[ 
						{
							
							name:'Business Project',
							code:'BP'
						},
						{
							
							name:'Accounting 1',
							code:'ACC'
						},
						]
						
				}
    ];

export default {
    props:['id'],
    data(){
        return{
            searchItem:{
                dept_name:'',
                course_name:'',
                trimester: '',
                period: ''
            },
         
            items:['CCS','CCE'],
            trueorfalse:[],
            feedback:'',
            showFeedback:false,
            showError:false,
            isChecked:false,
            isSearch:false,
            department,
            period,
            trim,
            deptShow:'',
            errors:[],
            	headers:[
                { text:'Import', value:'import'},
				{ text:'True', value:'true'},
				{ text:'False', value:'false'},
				{ text:'Question', value:'question'},

			],
            item:{
                question:'',
                A:'',
                B:'',
                C:'',
                D:'',
                answer:''
            }
        }
    },
    methods:{
        search()
        {
           axios.get('/api/search?dept_name=' + this.searchItem.dept_name + '&course_name=' + this.searchItem.course_name
                                        + '&trimester=' + this.searchItem.trimester + '&period=' + this.searchItem.period)
                 .then( res=>{  
                        
                        this.showError = false;
                         this.trueorfalse = res.data.data;     
                 })
                 .catch(error => {
                     let message = Object.values(error.response.data.errors);
					 this.errors = [].concat.apply([], message);
                     this.showError = true;
                   
                 });

        },
        addImport(trueorfalse){
         
           axios.post('/api/import-trueorfalse/' + this.id + '/' + trueorfalse)
                 .then(res => {
                        this.feedback = res.data.msg;
                        this.showFeedback = true;
                       
                 });
        
        },
        	changeDept(event)
		{
			this.searchItem.dept_name = event.target.options[event.target.options.selectedIndex].text;
		
			
		},
    }
}
</script>
