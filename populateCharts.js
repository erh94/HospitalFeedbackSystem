$.ajax({
    type: 'GET',
    url: 'templates/getdata.php',
    dataType: 'json', //tell jQuery to parse received data as JSON before passing it onto successCallback
    success: function (loaddata) {

                console.log(loaddata);
                 
                new Chart(document.getElementById("food-chart"), {
                type: 'doughnut',
                data: {
                labels: ["1 Star", "2 Star", "3 Star", "4 Star", "5 Star"],
                datasets: [
                    {
                    label: "Rate Hygiene",
                    backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                    data: loaddata['foodrate'],
                    }
                ]
                },
                options: {
                title: {
                    display: true,
                    text: 'Rating of food in Hospital'
                    }
                }
            });


            new Chart(document.getElementById("hygiene-chart"), {
    type: 'doughnut',
    data: {
    labels: ["1 Star", "2 Star", "3 Star", "4 Star", "5 Star"],
    datasets: [
        {
        label: "Rate Hygiene",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
        data: loaddata['hygienerate']
        }
    ]
    },
    options: {
    title: {
        display: true,
        text: 'Rating of Hygiene in Hospital'
    }
    }
});

 new Chart(document.getElementById("MO-chart"), {
    type: 'doughnut',
    data: {
    labels: ["1 Star", "2 Star", "3 Star", "4 Star", "5 Star"],
    datasets: [
        {
        label: "Rate Food Quality",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
        data: loaddata['rateMO']
        }
    ]
    },
    options: {
    title: {
        display: true,
        text: 'Ratings of Medical Officer'
    }
    }
});

new Chart(document.getElementById("overallAdmit-chart"), {
    type: 'doughnut',
    data: {
    labels: ["1 Star", "2 Star", "3 Star", "4 Star", "5 Star"],
    datasets: [
        {
        label: "Rate Food Quality",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
        data: loaddata['overall'],
        }
    ]
    },
    options: {
    title: {
        display: true,
        text: 'Overall Rating by Admitted Patient'
    }
    }
});
    }
});
 





$.ajax({
    type:'GET',
    url:'templates/getOPD.php',
    dataType:'json',
    success:function(loaddata){
        console.log(loaddata);

        new Chart(document.getElementById("rate-chart"),{
            type:'doughnut',
            data:{
                labels: ["1 Star", "2 Star", "3 Star", "4 Star", "5 Star"],
                datasets:[
                    {
                        label:"Rate OPD Treatment",
                        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                        data: loaddata['rate'],
                    }
                ]
            },
            options:{
                title:{
                    display:true,
                    text:'Ratings of OPD Treatment',
                }
            }
        });
    


    new Chart(document.getElementById("waiting-chart"),{
        type:'doughnut',
        data:{
            labels: ["less than 10 minutes", "10-30 minutes", "more than 30 minutes"],
            datasets:[
                {
                    label:"Rate OPD Treatment",
                    backgroundColor: ["#3cba9f","#e8c3b9","#c45850"],
                    data: loaddata['waitingTime'],
                }
            ]
        },
        options:{
            title:{
                display:true,
                text:'Waiting time for OPD treatment',
            }
        }
    });

    new Chart(document.getElementById("overall-chart"),{
        type:'doughnut',
        data:{
            labels: ["1 Star", "2 Star", "3 Star", "4 Star", "5 Star"],

            datasets:[
                {
                    label:"Overall OPD Treatment",
                    backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],

                    data: loaddata['overall'],
                }
            ]
        },
        options:{
            title:{
                display:true,
                text:'Overall Hospital treatment',
            }
        }
    });







}



});



$.ajax({
    type:'GET',
    url:'templates/getSpecial.php',
    dataType:'json',
    success:function(loaddata){
        console.log(loaddata);
        new Chart(document.getElementById("clash-chart"),{
            type:'doughnut',
            data:{
                labels:["No","Yes"],
                datasets:[
                    {
                        label:"Overall OPD Treatment",
                        backgroundColor: ["#3e95cd", "#8e5ea2"],

                        data: loaddata['clash'],
                    }
                ]
            },
            options:{
                title:{
                    display:true,
                    text:'Clash with Classes',
                }
            }




        });


        new Chart(document.getElementById("admitted-chart"),{
            type:'doughnut',
            data:{
                labels:["No","Yes"],
                datasets:[
                    {
                        label:"Overall OPD Treatment",
                        backgroundColor: ["#3e95cd", "#8e5ea2"],

                        data: loaddata['admitted'],
                    }
                ]
            },
            options:{
                title:{
                    display:true,
                    text:'Admitted Recommended',
                }
            }




        });


        new Chart(document.getElementById("rateS-chart"),{
            type:'doughnut',
            data:{
                labels: ["1 Star", "2 Star", "3 Star", "4 Star", "5 Star"],

                datasets:[
                    {
                        label:"Overall OPD Treatment",
                        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],

                        data: loaddata['rate'],
                    }
                ]
            },
            options:{
                title:{
                    display:true,
                    text:'Overall Hospital treatment',
                }
            }
        });


        new Chart(document.getElementById("overallSpecialist-chart"),{
            type:'doughnut',
            data:{
                labels: ["1 Star", "2 Star", "3 Star", "4 Star", "5 Star"],

                datasets:[
                    {
                        label:"Overall OPD Treatment",
                        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],

                        data: loaddata['overall'],
                    }
                ]
            },
            options:{
                title:{
                    display:true,
                    text:'Overall Hospital treatment',
                }
            }
        });
    
        new Chart(document.getElementById("waitingS-chart"),{
            type:'doughnut',
            data:{
                labels: ["less than 3 days", "1 week", "1-2 week", "more than 2 weeks"],

                datasets:[
                    {
                        label:"Overall OPD Treatment",
                        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],

                        data: loaddata['waitingTime'],
                    }
                ]
            },
            options:{
                title:{
                    display:true,
                    text:'Overall Hospital treatment',
                }
            }
        });
    
        



        






    }
});


