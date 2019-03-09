console.warn('Hello from Development.');

class Forms {

  static initializeConditionsAndSymptomsDropdowns() {

    $('.ui.dropdown.conditions_dd')
    .dropdown()
    ;

    /* <option value="">State</option> */
    const dropdown = $('#conditions_dd');
    const items = [];
    $.ajax({
      type : 'get',
      url: '/all/conditions',
      success:function(cond){

        cond.forEach((c) => {
          items.push(`<option value="${c.common_name.replace(/['"]+/g, '')}">${c.common_name.replace(/['"]+/g, '')} <b class="text-primary"> ..... ${ c.extras_hint.replace(/['"]+/g, '') } ..... ${c.severity}</b></option>`);
        });

        dropdown.append(items);
      }
    });

    $('.ui.fluid.search.dropdown')
    .search()
    .dropdown()
    ;

    const s_dropdown = $('#symptoms_dd');
    const s_items = [];
    $.ajax({
      type : 'get',
      url: '/all/symptoms',
      success:function(symp){
        symp.forEach((s) => {
          s_dropdown.append(`<option id="${Math.random().toString(36).substr(2, 5)}" value="${s.common_name.replace(/['"]+/g, '')}" >${s.common_name.replace(/['"]+/g, '')} ..... ${s.name.replace(/['"]+/g, '')}</option>`);
        });
        s_dropdown.append(items);
      }
    });

    const m_dropdown = $('#medication_other_mult');
    $.ajax({
      type : 'get',
      url: '/all/medication',
      success:function(medi){
        medi.forEach((m) => {
          m_dropdown.append(`<option id="${Math.random().toString(36).substr(2, 5)}" value="${m.medication_o}" >${m.medication_o}</option>`);
        });
      }
    });

  }

}

Forms.initializeConditionsAndSymptomsDropdowns();