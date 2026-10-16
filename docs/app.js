// Render user-entered text safely, without interpreting it as HTML.
const escapeHTML=value=>String(value).replace(/[&<>"']/g,c=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c]));
// Browser storage keeps demo changes on this device only; storage may be disabled.
function readState(key,initial){try{return JSON.parse(localStorage.getItem(key))||structuredClone(initial)}catch{return structuredClone(initial)}}
function saveState(key,value){try{localStorage.setItem(key,JSON.stringify(value))}catch{}}
function notify(message){document.querySelector('#status').textContent=message}
const initial={projects:[{id:101,name:'Workspace refresh',owner:'Jordan Demo',date:'2026-09-01',done:false},{id:102,name:'Customer experience',owner:'Casey Morgan',date:'2026-09-15',done:false},{id:103,name:'Team onboarding',owner:'Riley Park',date:'2026-08-10',done:true}]};
let state=readState('companyportal-demo-v1',initial);let page='overview';
const employees=['Jordan Demo','Casey Morgan','Riley Park'];
function projectTable(){return `<div class="table-wrap"><table><thead><tr><th>Project</th><th>Assigned to</th><th>Start date</th><th>Status</th><th>Action</th></tr></thead><tbody>${state.projects.map(p=>`<tr><td>${escapeHTML(p.name)}</td><td>${escapeHTML(p.owner)}</td><td>${escapeHTML(p.date)}</td><td><span class="pill">${p.done?'Completed':'Active'}</span></td><td><button class="secondary" data-toggle="${p.id}">${p.done?'Reopen':'Complete'}</button></td></tr>`).join('')}</tbody></table></div>`}
// Each navigation view presents fictional records corresponding to the portal's features.
function render(){const c=document.querySelector('#content');if(page==='overview')c.innerHTML=`<div class="stats"><div class="card"><small>Active projects</small><strong>${state.projects.filter(p=>!p.done).length}</strong></div><div class="card"><small>Team members</small><strong>3</strong></div><div class="card"><small>Completed</small><strong>${state.projects.filter(p=>p.done).length}</strong></div></div><div class="card"><div class="row"><h2>Project overview</h2><span class="pill">Team workspace</span></div>${projectTable()}</div><div class="card"><h2>Everything in its place</h2><p>Explore your profile, review sample salary records, or create and assign a project from the Projects tab.</p></div>`;
if(page==='projects')c.innerHTML=`<div class="card"><h2>Current projects</h2>${projectTable()}</div><form id="project-form" class="card"><h2>Add a project</h2><label for="name">Project name</label><input id="name" maxlength="80" required placeholder="e.g. Service improvement"><div class="split"><div><label for="owner">Assign to</label><select id="owner">${employees.map(n=>`<option>${n}</option>`).join('')}</select></div><div><label for="date">Start date</label><input id="date" type="date" required></div></div><button>Create project</button></form>`;
if(page==='profile')c.innerHTML='<div class="card"><h2>My profile</h2><div class="person"><span class="avatar">JD</span><div><strong>Jordan Demo</strong><br><small>EMP-001 · Project manager</small></div></div><dl><dt>Department</dt><dd>Operations</dd><dt>Email</dt><dd>jordan@example.com</dd><dt>Joined</dt><dd>March 4, 2024</dd></dl></div>';
if(page==='salary')c.innerHTML='<div class="card"><h2>Salary information</h2><p>Illustrative annual compensation for the demo team.</p><div class="table-wrap"><table><thead><tr><th>Employee</th><th>Base salary</th><th>Bonus</th></tr></thead><tbody><tr><td>Jordan Demo</td><td>$75,000</td><td>$3,000</td></tr><tr><td>Casey Morgan</td><td>$68,000</td><td>$2,000</td></tr><tr><td>Riley Park</td><td>$64,000</td><td>$2,000</td></tr></tbody></table></div></div>';
if(page==='dependents')c.innerHTML='<div class="card"><h2>Dependents</h2><p>Sample benefit records for Jordan Demo.</p><div class="table-wrap"><table><thead><tr><th>Name</th><th>Relationship</th><th>Coverage</th></tr></thead><tbody><tr><td>Taylor Demo</td><td>Partner</td><td>Family plan</td></tr></tbody></table></div></div>';
if(page==='edit')c.innerHTML=`<form class="card" id="employee-form"><h2>Update profile</h2><label for="employee-name">Full name</label><input id="employee-name" value="${escapeHTML(state.profileName||'Jordan Demo')}" required maxlength="80"><label for="employee-email">Email</label><input id="employee-email" type="email" value="jordan@example.com" readonly><label for="department">Department</label><select id="department"><option>Operations</option><option>Engineering</option><option>Support</option></select><button>Save demo profile</button><hr><button type="button" disabled>Change password</button><p class="muted">Edits affect this browser's sample profile only. Account credentials cannot be changed.</p></form>`;
if(page==='assign')c.innerHTML=`<form class="card" id="assignment-form"><h2>Assign projects</h2><label for="assignment-project">Project</label><select id="assignment-project">${state.projects.map(p=>`<option value="${p.id}">${escapeHTML(p.name)}</option>`).join('')}</select><label for="assignment-owner">Employee</label><select id="assignment-owner">${employees.map(n=>`<option>${n}</option>`).join('')}</select><button>Assign demo project</button></form>`;
if(page==='remove')c.innerHTML=`<div class="card"><h2>Complete / remove projects</h2>${projectTable()}<p class="muted">Complete or reopen sample projects above. Permanent deletion is disabled.</p><button disabled>Delete project permanently</button></div>`;
if(page==='manager')c.innerHTML='<form class="card" id="salary-form"><h2>Manager access — salary entry</h2><label for="salary-employee">Employee</label><input id="salary-employee" value="Jordan Demo" readonly><label for="salary-value">Annual salary ($)</label><input id="salary-value" type="number" min="0" max="1000000" required value="75000"><label for="bonus-value">Bonus ($)</label><input id="bonus-value" type="number" min="0" max="1000000" required value="3000"><button>Save demo salary</button><p class="muted">Fictional compensation; edits stay in this browser.</p></form>';
if(page==='dependents')c.innerHTML+='<div class="card"><h2>Manage dependents</h2><label for="dependent-name">Name</label><input id="dependent-name" value="Taylor Demo" readonly><label for="dependent-relation">Relationship</label><input id="dependent-relation" value="Partner" readonly><button disabled>Add dependent</button> <button disabled>Remove dependent</button><p class="muted">Dependent changes are disabled in this public demo.</p></div>';
if(page==='profile'&&state.profileName)c.innerHTML=c.innerHTML.replace('Jordan Demo',escapeHTML(state.profileName));
if(page==='salary'&&state.salary)c.innerHTML=c.innerHTML.replace('$75,000',escapeHTML('$'+Number(state.salary.base).toLocaleString('en-US'))).replace('$3,000',escapeHTML('$'+Number(state.salary.bonus).toLocaleString('en-US')));

}
document.addEventListener('click',e=>{const b=e.target.closest('button');if(!b)return;if(b.dataset.page){page=b.dataset.page;document.querySelectorAll('[data-page]').forEach(n=>n.setAttribute('aria-current',n===b?'page':'false'));notify('');render()}if(b.dataset.toggle){const p=state.projects.find(p=>p.id===Number(b.dataset.toggle));p.done=!p.done;saveState('companyportal-demo-v1',state);render();notify('Project status updated.')}});
document.addEventListener('submit',e=>{if(e.target.id!=='project-form')return;e.preventDefault();const name=document.querySelector('#name').value.trim();if(!name)return;state.projects.push({id:Date.now(),name,owner:document.querySelector('#owner').value,date:document.querySelector('#date').value,done:false});saveState('companyportal-demo-v1',state);render();notify('Project created and assigned.')});
document.querySelector('#reset').addEventListener('click',()=>{state=structuredClone(initial);saveState('companyportal-demo-v1',state);render();notify('Demo reset to sample data.')});render();

// Simulate entry and logout without collecting credentials or creating a server session.
// Opening the demo always starts at the sample-account screen.
function setDemoEntry(loggedIn){
 document.querySelector('#login-screen').hidden=loggedIn;
 document.querySelector('#demo-app').hidden=!loggedIn;
 document.querySelector('#demo-footer').hidden=!loggedIn;
 const target=loggedIn?document.querySelector('#demo-app h1'):document.querySelector('#login-title');
 target.setAttribute('tabindex','-1'); target.focus();
}
document.querySelector('#demo-login').addEventListener('click',()=>setDemoEntry(true));
document.querySelector('#demo-logout').addEventListener('click',()=>setDemoEntry(false));

// Preview record changes locally; no employee or payroll service is contacted.
document.addEventListener('submit',e=>{
 if(!['employee-form','assignment-form','salary-form'].includes(e.target.id))return;
 e.preventDefault();
 if(e.target.id==='employee-form')state.profileName=document.querySelector('#employee-name').value.trim();
 if(e.target.id==='assignment-form'){const project=state.projects.find(p=>p.id===Number(document.querySelector('#assignment-project').value));if(project)project.owner=document.querySelector('#assignment-owner').value;}
 if(e.target.id==='salary-form')state.salary={base:Number(document.querySelector('#salary-value').value),bonus:Number(document.querySelector('#bonus-value').value)};
 saveState('companyportal-demo-v1',state);notify('Sample record saved in this browser.');
});
