
import Department from './components/Department/Department.vue';
import AddDept from './components/Department/AddDept.vue';
import Question from './components/Question/Question.vue';
import AddQuestion from './components/Question/AddQuestion.vue';

 export const  routes = [
    {
        path: '/department',
        name: 'department',
        component: Department
    },
    {
        path: '/',
        redirect: { name: 'department' }
    },
    {
        path: '/add-dept',
        name: 'add-dept',
        component: AddDept
    },
    {
        path: '/edit-dept/:id',
        name: 'edit-dept',
        component: AddDept,
        props: true
    },
      {
        path: '/question/:id',
        name: 'question',
        component: Question,
        props: true
    },
    {
        path: '*',
        redirect: '/'
    },
    {
        path: '/add-question/:id',
        name: 'add-question',
        component: AddQuestion,
        props: true
    },
     {
        path: '/edit-question/:id',
        name: 'edit-question',
        component: AddQuestion,
        props: true
    },
]

